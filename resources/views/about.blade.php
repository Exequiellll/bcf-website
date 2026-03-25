@extends('layouts.app')

@section('title', 'About Us - BCF Church Fellowship')
@section('meta_description', 'Learn about BCF Church Fellowship - our mission, vision, and core values. Discover what drives our church family in serving our community.')

@section('content')

<style>
    /* Accordion Styles */
    .accordion-item {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .accordion-header {
        width: 100%;
        padding: 1rem 1.5rem;
        text-align: left;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .accordion-header:hover {
        background-color: #f9fafb;
    }

    .accordion-chevron {
        transition: transform 0.3s ease;
    }

    .accordion-chevron.rotate-180 {
        transform: rotate(180deg);
    }

    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
        background-color: white;
        border-left: 1px solid #e5e7eb;
        border-right: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }

    .accordion-content-inner {
        padding: 1.5rem;
        color: #4b5563;
        line-height: 1.6;
    }
    
    .section-title {
        color: #1e40af;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    
    .section-subtitle {
        color: #64748b;
        font-size: 1.25rem;
        text-align: center;
        max-width: 800px;
        margin: 0 auto 3rem;
        line-height: 1.6;
    }
    
    .back-to-home {
        display: inline-flex;
        align-items: center;
        color: #1e40af;
        font-weight: 600;
        margin-bottom: 2rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .back-to-home:hover {
        color: #1e3a8a;
        transform: translateX(-5px);
    }
</style>
      <div data-aos=fade-up>
        <div class="text-center mb-8 pt-10">
            <h1 class="section-title">About Our Church</h1>
            <p class="section-subtitle">
                Discover the heart and soul of our church family. Learn about our mission, vision, and the core values that guide us in serving our community and glorifying God.
            </p>
        </div>
</div>
    <!-- Mission & Vision Section -->
    <section id="mission-vision" class="mb-5">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-6 h-full">
                <!-- Mission Card -->
                <div class="flex-1" data-aos="slide-right">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col">
                        <div class="p-8 flex-1">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl mr-4">
                                    <i class="fas fa-bullseye text-white text-2xl"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">Our Mission</h2>
                            </div>
                            <p class="text-gray-600 leading-relaxed">
                                We exists to Find people to Christ through  intentional evangelism, Incorporate them to the church membership to develop commitment for spiritual growth, Nurture them through equipping to serve and finally Deploy them in their respective calling, according to their spiritual gifts, where the gospel of Christ will be preached and the  kingdom of God will be advanced everywhere God is leading us.
                        </div>
                    </div>
                </div>
                
                <!-- Vision Card -->
                <div class="flex-1" data-aos="slide-left">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col">
                        <div class="p-8 flex-1">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl mr-4">
                                    <i class="fas fa-eye text-white text-2xl"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">Our Vision</h2>
                            </div>
                            <p class="text-gray-600 leading-relaxed">
                                To be a thriving, high impact, life transforming, Pentecostal church where God has planted us and will be planting us until the Second Coming of Christ, locally and abroad, by developing leader of leaders through intentional discipleship who can advance the kingdom of 
God in contemporary world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Core Values Section -->
    <section id="core-values" class="pt-10 pb-1">
        <div data-aos=fade-up>
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Core Values</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    These values guide everything we do as a church family, shaping our decisions and ministry approach.
                </p>
            </div>
         </div>
        <div class="max-w-3xl mx-auto space-y-3">
            <!-- Worship -->
             <div data-aos=slide-left  data-aos-duration="2x000">
                <div class="accordion-item">
                    <button class="accordion-header w-full">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-hands-praying text-blue-600"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Authentic Worship</span>
                        </div>
                        <i class="accordion-chevron fas fa-chevron-down text-gray-500 transform transition-transform duration-300"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            We prioritize passionate, God-honoring worship that is both biblical and culturally relevant, creating space for God's presence to transform lives.
                        </div>
                    </div>
                </div>
             </div>
            <!-- Biblical Truth -->
             <div data-aos=slide-right  data-aos-duration="2000">
                <div class="accordion-item">
                    <button class="accordion-header w-full">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-bible text-blue-600"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Biblical Truth</span>
                        </div>
                        <i class="accordion-chevron fas fa-chevron-down text-gray-500 transform transition-transform duration-300"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            We are committed to the authority of Scripture, teaching God's Word with clarity, relevance, and practical application for daily living.
                        </div>
                    </div>
                </div>
             </div>
            <!-- Community -->
             <div data-aos=slide-left data-aos-duration="2000">
                <div class="accordion-item">
                    <button class="accordion-header w-full">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-people-group text-blue-600"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Authentic Community</span>
                        </div>
                        <i class="accordion-chevron fas fa-chevron-down text-gray-500 transform transition-transform duration-300"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            We believe life change happens best in the context of relationships, so we encourage everyone to connect in small groups for spiritual growth and support.
                        </div>
                    </div>
                </div>
             </div>
            <!-- Prayer -->
             <div data-aos=slide-right  data-aos-duration="2000">
                <div class="accordion-item">
                    <button class="accordion-header w-full">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-pray text-blue-600"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Prayer</span>
                        </div>
                        <i class="accordion-chevron fas fa-chevron-down text-gray-500 transform transition-transform duration-300"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            We are a people of prayer, believing that God moves in response to the prayers of His people, and we seek His guidance in all we do.
                        </div>
                    </div>
                </div>
             </div>
            <!-- Generosity -->
             <div data-aos=slide-left data-aos-duration="2000">
                <div class="accordion-item">
                    <button class="accordion-header w-full">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-hand-holding-heart text-blue-600"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Generosity</span>
                        </div>
                        <i class="accordion-chevron fas fa-chevron-down text-gray-500 transform transition-transform duration-300"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            We believe in generous living, giving our time, talents, and resources to advance God's kingdom and bless others.
                        </div>
                    </div>
                </div>
             </div>
            <!-- Outreach -->
             <div data-aos=slide-right data-aos-duration="2000">
                <div class="accordion-item">
                    <button class="accordion-header w-full">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                <i class="fas fa-hands-helping text-blue-600"></i>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Outreach</span>
                        </div>
                        <i class="accordion-chevron fas fa-chevron-down text-gray-500 transform transition-transform duration-300"></i>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-content-inner">
                            We are committed to reaching our community and the world with the love of Christ through service, evangelism, and missions.
                        </div>
                    </div>
                </div>
             </div>   
        </div>
    </section>
    
    <!-- Call to Action -->
    <section class="text-center py-12">
         <div data-aos=fade-up data-aos-duration="3000">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-8 text-white">
                <h2 class="text-3xl font-bold mb-4">Join Us This Sunday</h2>
                <p class="text-xl mb-8 max-w-2xl mx-auto">Experience our welcoming community and uplifting worship service.</p>
                <a href="{{ route('schedules.index') }}" class="inline-block bg-white text-blue-600 hover:bg-blue-50 font-semibold py-3 px-8 rounded-full text-lg transition-all duration-300">
                    View Service Times
                </a>
            </div>
         </div>
    </section>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionItems = document.querySelectorAll('.accordion-item');
        
        accordionItems.forEach(item => {
            const header = item.querySelector('.accordion-header');
            const content = item.querySelector('.accordion-content');
            const icon = header.querySelector('i');
            
            header.addEventListener('click', () => {
                // Close all other accordion items
                accordionItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.querySelector('.accordion-content').style.maxHeight = '0';
                        otherItem.querySelector('.accordion-chevron').classList.remove('rotate-180');
                    }
                });
                
                // Toggle current item
                const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';
                content.style.maxHeight = isOpen ? '0' : `${content.scrollHeight}px`;
                header.querySelector('.accordion-chevron').classList.toggle('rotate-180');
            });
            
            // Open first item by default
            if (item === accordionItems[0]) {
                content.style.maxHeight = `${content.scrollHeight}px`;
                header.querySelector('.accordion-chevron').classList.add('rotate-180');
            }
        });
    });
</script>
@endpush

@endsection
