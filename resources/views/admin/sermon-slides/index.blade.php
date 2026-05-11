@extends('layouts.admin')

@section('title', 'Sunday Sermon')

@section('content')
<div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8" x-data="{ confirmReplace: false, showForm: {{ $sermon ? 'false' : 'true' }} }">
    <div class="px-0 py-6">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-2">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Sunday Sermon</h1>
        </div>

        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg mb-6">
            <p class="text-sm text-blue-700">
                <strong>How it works:</strong> Export your sermon PowerPoint as JPEG images
                (<em>File → Export → Change File Type → JPEG</em>), then upload all the slides here.
                Only the most recent sermon is shown on the homepage — replacing it deletes the previous one.
            </p>
        </div>

        @if($sermon)
            <!-- Current Sermon Preview -->
            <div class="bg-white shadow rounded-lg overflow-hidden mb-8">
                <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider {{ $sermon->is_published ? 'text-green-600' : 'text-gray-500' }} mb-1">
                            {{ $sermon->is_published ? '● Live on Homepage' : '○ Hidden from Homepage' }}
                        </p>
                        <h2 class="text-xl font-bold text-gray-900">{{ $sermon->title }}</h2>
                        <p class="text-sm text-gray-600 mt-1">
                            {{ $sermon->sermon_date->format('F d, Y') }}
                            @if($sermon->speaker)
                                · {{ $sermon->speaker }}
                            @endif
                            · {{ count($sermon->slides) }} {{ Str::plural('slide', count($sermon->slides)) }}
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <form method="POST" action="{{ route('admin.sermon-slides.toggle') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                {{ $sermon->is_published ? 'Hide' : 'Show' }}
                            </button>
                        </form>
                        <button @click="showForm = true; confirmReplace = false" type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            Replace
                        </button>
                        <form method="POST" action="{{ route('admin.sermon-slides.destroy') }}" onsubmit="return confirm('Delete this sermon permanently? All slide images will be removed.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-2 border border-red-300 text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Slide thumbnails (drag-and-drop reorder) -->
                <div class="p-6" x-data="slideReorder({{ Js::from($sermon->slides) }})">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-3">
                        <p class="text-xs text-blue-600 font-medium">
                            <i class="fas fa-hand-rock mr-1"></i>
                            Drag the slides to reorder · Changes save automatically
                        </p>
                        <p class="text-xs font-medium" :class="{
                            'text-gray-400': status === 'idle',
                            'text-blue-600': status === 'saving',
                            'text-green-600': status === 'saved',
                            'text-red-600': status === 'error'
                        }">
                            <span x-show="status === 'idle'" x-cloak>—</span>
                            <span x-show="status === 'saving'" x-cloak><i class="fas fa-spinner fa-spin mr-1"></i> Saving order…</span>
                            <span x-show="status === 'saved'" x-cloak><i class="fas fa-check-circle mr-1"></i> Order saved</span>
                            <span x-show="status === 'error'" x-cloak><i class="fas fa-exclamation-circle mr-1"></i> Save failed — try again</span>
                        </p>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                        <template x-for="(slide, index) in slides" :key="slide">
                            <div class="relative aspect-video bg-gray-100 rounded-lg overflow-hidden border-2 transition-all duration-200 group select-none"
                                 :class="[
                                     draggedIndex === index ? 'opacity-40 scale-95 border-blue-400' : 'border-gray-200',
                                     dragOverIndex === index && draggedIndex !== index ? 'border-blue-500 ring-2 ring-blue-200 scale-105' : '',
                                     draggedIndex === null ? 'cursor-grab' : 'cursor-grabbing'
                                 ]"
                                 draggable="true"
                                 @dragstart="onDragStart(index, $event)"
                                 @dragover.prevent="onDragOver($event)"
                                 @dragenter.prevent="dragOverIndex = index"
                                 @dragleave="dragOverIndex === index && (dragOverIndex = null)"
                                 @drop.prevent="onDrop(index)"
                                 @dragend="onDragEnd()">
                                <img :src="assetUrl(slide)" :alt="'Slide ' + (index + 1)"
                                     class="w-full h-full object-contain pointer-events-none"
                                     loading="lazy"
                                     draggable="false">

                                <!-- Position number badge -->
                                <span class="absolute top-1.5 left-1.5 bg-blue-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center shadow-md" x-text="index + 1"></span>

                                <!-- Grip indicator (top center) -->
                                <div class="absolute top-1 left-1/2 -translate-x-1/2 text-white opacity-0 group-hover:opacity-90 transition-opacity pointer-events-none">
                                    <svg class="w-5 h-5 drop-shadow-md" fill="currentColor" viewBox="0 0 24 24">
                                        <circle cx="9" cy="6" r="1.5"/><circle cx="15" cy="6" r="1.5"/>
                                        <circle cx="9" cy="12" r="1.5"/><circle cx="15" cy="12" r="1.5"/>
                                        <circle cx="9" cy="18" r="1.5"/><circle cx="15" cy="18" r="1.5"/>
                                    </svg>
                                </div>

                                <!-- Mobile reorder buttons -->
                                <div class="absolute bottom-1 left-1/2 -translate-x-1/2 flex gap-1 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
                                    <button type="button" @click.stop="moveLeft(index)"
                                            x-show="index > 0"
                                            class="bg-white/95 hover:bg-blue-50 text-blue-700 rounded-full w-7 h-7 flex items-center justify-center shadow-md"
                                            title="Move left">
                                        <i class="fas fa-chevron-left text-xs"></i>
                                    </button>
                                    <button type="button" @click.stop="moveRight(index)"
                                            x-show="index < slides.length - 1"
                                            class="bg-white/95 hover:bg-blue-50 text-blue-700 rounded-full w-7 h-7 flex items-center justify-center shadow-md"
                                            title="Move right">
                                        <i class="fas fa-chevron-right text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        @endif

        <!-- Upload Form -->
        <div x-show="showForm" x-cloak class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-900">
                    {{ $sermon ? 'Replace with New Sermon' : 'Upload Sunday Sermon' }}
                </h2>
                @if($sermon)
                    <button @click="showForm = false" type="button" class="text-sm text-gray-500 hover:text-gray-700">Cancel</button>
                @endif
            </div>

            <form method="POST" action="{{ route('admin.sermon-slides.store') }}" enctype="multipart/form-data" class="p-6 space-y-6"
                  x-data="slideUploader()" @submit="prepareSubmit($event)">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Sermon Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" required maxlength="255"
                           value="{{ old('title') }}"
                           placeholder="Faith That Moves Mountains"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="sermon_date" class="block text-sm font-medium text-gray-700 mb-1">Sermon Date <span class="text-red-500">*</span></label>
                        <input type="date" name="sermon_date" id="sermon_date" required
                               value="{{ old('sermon_date', now()->previous('Sunday')->format('Y-m-d')) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="speaker" class="block text-sm font-medium text-gray-700 mb-1">Speaker (optional)</label>
                        <input type="text" name="speaker" id="speaker" maxlength="255"
                               value="{{ old('speaker') }}"
                               placeholder="Pastor Name"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slide Images <span class="text-red-500">*</span></label>

                    <!-- Drop zone -->
                    <div @click="$refs.fileInput.click()"
                         @dragover.prevent="dragging = true"
                         @dragleave.prevent="dragging = false"
                         @drop.prevent="handleDrop($event)"
                         :class="dragging ? 'border-blue-500 bg-blue-50' : 'border-gray-300'"
                         class="border-2 border-dashed rounded-lg p-8 text-center cursor-pointer transition-colors">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <p class="mt-2 text-sm text-gray-700"><span class="font-semibold text-blue-600">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 mt-1">JPG, PNG, WEBP up to 10MB each. Select all slides at once.</p>
                        <input type="file" name="slides[]" id="slides" multiple accept="image/jpeg,image/png,image/webp"
                               x-ref="fileInput" @change="handleFiles($event.target.files)" class="hidden">
                    </div>

                    <!-- Preview grid -->
                    <div x-show="previews.length > 0" class="mt-4">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 mb-3">
                            <p class="text-xs text-gray-600">
                                <span x-text="previews.length"></span> file<span x-show="previews.length !== 1">s</span> selected
                            </p>
                            <p class="text-xs text-blue-600 font-medium">
                                <i class="fas fa-hand-rock mr-1"></i>
                                Drag the thumbnails to reorder
                            </p>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                            <template x-for="(preview, index) in previews" :key="preview.id">
                                <div class="relative aspect-video bg-gray-100 rounded-lg overflow-hidden border-2 transition-all duration-200 group select-none"
                                     :class="[
                                         draggedIndex === index ? 'opacity-40 scale-95 border-blue-400' : 'border-gray-200',
                                         dragOverIndex === index && draggedIndex !== index ? 'border-blue-500 ring-2 ring-blue-200 scale-105' : '',
                                         draggedIndex === null ? 'cursor-grab' : 'cursor-grabbing'
                                     ]"
                                     draggable="true"
                                     @dragstart="onDragStart(index, $event)"
                                     @dragover.prevent="onDragOver(index, $event)"
                                     @dragenter.prevent="dragOverIndex = index"
                                     @dragleave="dragOverIndex === index && (dragOverIndex = null)"
                                     @drop.prevent="onDrop(index)"
                                     @dragend="onDragEnd()">
                                    <img :src="preview.url" :alt="preview.name" class="w-full h-full object-contain pointer-events-none" draggable="false">

                                    <!-- Position number badge -->
                                    <span class="absolute top-1.5 left-1.5 bg-blue-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center shadow-md" x-text="index + 1"></span>

                                    <!-- Grip icon (top center) -->
                                    <div class="absolute top-1 left-1/2 -translate-x-1/2 text-white opacity-0 group-hover:opacity-90 transition-opacity pointer-events-none">
                                        <svg class="w-5 h-5 drop-shadow-md" fill="currentColor" viewBox="0 0 24 24">
                                            <circle cx="9" cy="6" r="1.5"/><circle cx="15" cy="6" r="1.5"/>
                                            <circle cx="9" cy="12" r="1.5"/><circle cx="15" cy="12" r="1.5"/>
                                            <circle cx="9" cy="18" r="1.5"/><circle cx="15" cy="18" r="1.5"/>
                                        </svg>
                                    </div>

                                    <!-- Remove button (top right) -->
                                    <button type="button" @click.stop="removePreview(index)"
                                            class="absolute top-1.5 right-1.5 bg-red-600 hover:bg-red-700 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity shadow-md"
                                            title="Remove">×</button>

                                    <!-- Mobile reorder buttons (visible only on touch / small screens) -->
                                    <div class="absolute bottom-1 left-1/2 -translate-x-1/2 flex gap-1 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
                                        <button type="button" @click.stop="moveLeft(index)"
                                                x-show="index > 0"
                                                class="bg-white/95 hover:bg-blue-50 text-blue-700 rounded-full w-7 h-7 flex items-center justify-center shadow-md"
                                                title="Move left">
                                            <i class="fas fa-chevron-left text-xs"></i>
                                        </button>
                                        <button type="button" @click.stop="moveRight(index)"
                                                x-show="index < previews.length - 1"
                                                class="bg-white/95 hover:bg-blue-50 text-blue-700 rounded-full w-7 h-7 flex items-center justify-center shadow-md"
                                                title="Move right">
                                            <i class="fas fa-chevron-right text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-wrap gap-3 border-t border-gray-200">
                    <button type="submit" :disabled="previews.length === 0"
                            :class="previews.length === 0 ? 'opacity-50 cursor-not-allowed' : ''"
                            class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        {{ $sermon ? 'Replace Sermon' : 'Publish Sermon' }}
                    </button>
                    @if($sermon)
                        <button @click="showForm = false" type="button" class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Cancel</button>
                    @endif
                </div>
            </form>
        </div>

        @if(!$sermon)
            <div x-show="!showForm" class="text-center py-12">
                <p class="text-gray-500">No sermon uploaded yet.</p>
                <button @click="showForm = true" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Upload Sermon
                </button>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
function slideUploader() {
    return {
        dragging: false,
        previews: [],
        files: [],
        draggedIndex: null,
        dragOverIndex: null,

        handleFiles(fileList) {
            const arr = Array.from(fileList).filter(f => f.type.startsWith('image/'));
            arr.sort((a, b) => this.naturalCompare(a.name, b.name));
            this.files = arr;
            this.previews = arr.map((file, i) => ({
                id: file.name + '-' + i + '-' + file.size,
                name: file.name,
                url: URL.createObjectURL(file),
            }));
            this.dragging = false;
        },

        handleDrop(e) {
            this.dragging = false;
            this.handleFiles(e.dataTransfer.files);
        },

        removePreview(index) {
            URL.revokeObjectURL(this.previews[index].url);
            this.previews.splice(index, 1);
            this.files.splice(index, 1);
            this.syncFileInput();
        },

        // === Reordering ===
        onDragStart(index, event) {
            this.draggedIndex = index;
            event.dataTransfer.effectAllowed = 'move';
            // Some browsers require data to be set for the drag to work
            try { event.dataTransfer.setData('text/plain', String(index)); } catch (e) {}
        },

        onDragOver(index, event) {
            event.dataTransfer.dropEffect = 'move';
        },

        onDrop(targetIndex) {
            const from = this.draggedIndex;
            this.dragOverIndex = null;
            this.draggedIndex = null;
            if (from === null || from === targetIndex) return;
            this.reorder(from, targetIndex);
        },

        onDragEnd() {
            this.draggedIndex = null;
            this.dragOverIndex = null;
        },

        reorder(from, to) {
            const movedPreview = this.previews.splice(from, 1)[0];
            this.previews.splice(to, 0, movedPreview);
            const movedFile = this.files.splice(from, 1)[0];
            this.files.splice(to, 0, movedFile);
            this.syncFileInput();
        },

        moveLeft(index) {
            if (index > 0) this.reorder(index, index - 1);
        },

        moveRight(index) {
            if (index < this.previews.length - 1) this.reorder(index, index + 1);
        },

        syncFileInput() {
            const dt = new DataTransfer();
            this.files.forEach(f => dt.items.add(f));
            this.$refs.fileInput.files = dt.files;
        },

        prepareSubmit(e) {
            if (this.previews.length === 0) {
                e.preventDefault();
                alert('Please select at least one slide image.');
                return;
            }
            this.syncFileInput();
        },

        naturalCompare(a, b) {
            return a.localeCompare(b, undefined, { numeric: true, sensitivity: 'base' });
        },
    };
}

function slideReorder(initialSlides) {
    return {
        slides: initialSlides,
        draggedIndex: null,
        dragOverIndex: null,
        status: 'idle',          // 'idle' | 'saving' | 'saved' | 'error'
        statusTimer: null,

        assetUrl(path) {
            const clean = path.startsWith('/') ? path.slice(1) : path;
            return '/' + clean;
        },

        onDragStart(index, event) {
            this.draggedIndex = index;
            event.dataTransfer.effectAllowed = 'move';
            try { event.dataTransfer.setData('text/plain', String(index)); } catch (e) {}
        },

        onDragOver(event) {
            event.dataTransfer.dropEffect = 'move';
        },

        onDrop(targetIndex) {
            const from = this.draggedIndex;
            this.dragOverIndex = null;
            this.draggedIndex = null;
            if (from === null || from === targetIndex) return;
            this.reorder(from, targetIndex);
        },

        onDragEnd() {
            this.draggedIndex = null;
            this.dragOverIndex = null;
        },

        reorder(from, to) {
            const moved = this.slides.splice(from, 1)[0];
            this.slides.splice(to, 0, moved);
            this.save();
        },

        moveLeft(index) {
            if (index > 0) this.reorder(index, index - 1);
        },

        moveRight(index) {
            if (index < this.slides.length - 1) this.reorder(index, index + 1);
        },

        save() {
            this.status = 'saving';
            if (this.statusTimer) clearTimeout(this.statusTimer);

            fetch('{{ route("admin.sermon-slides.reorder") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ order: this.slides }),
            })
            .then(r => r.json().catch(() => ({ success: r.ok })))
            .then(data => {
                if (data.success) {
                    this.status = 'saved';
                    this.statusTimer = setTimeout(() => { this.status = 'idle'; }, 2000);
                } else {
                    this.status = 'error';
                    this.statusTimer = setTimeout(() => { this.status = 'idle'; }, 3000);
                }
            })
            .catch(() => {
                this.status = 'error';
                this.statusTimer = setTimeout(() => { this.status = 'idle'; }, 3000);
            });
        },
    };
}
</script>
@endpush

@endsection
