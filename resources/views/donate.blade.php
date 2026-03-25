@extends('layouts.app')
@section('title', 'Support Our Ministry - BCF Church Fellowship')
@section('meta_description', 'Support BCF Church Fellowship through GCash or BPI bank transfer. Your generosity makes a difference.')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Support Our Ministry</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Thank you for your generous heart and willingness to support our ministry. Your contributions make a real difference in our community.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <!-- GCash Donation -->
             <div data-aos=fade-right data-aos-duration="2000">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-600 px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="p-2.5 bg-white/20 rounded-lg">
                                <i class="fas fa-mobile-alt text-white text-xl"></i>
                            </div>
                            <h2 class="text-xl font-bold text-white">GCash Donation</h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <i class="fas fa-user-circle text-gray-400 w-5 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-500">Account Name</p>
                                    <p class="font-medium text-gray-800">Eunice F.</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone-alt text-gray-400 w-5 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-500">GCash Number</p>
                                    <p class="font-mono font-medium text-gray-800">0955 433 0134</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <div class="flex flex-col items-center">
                                <div class="p-2 bg-white rounded-lg border-2 border-blue-100 mb-3">
                                    <div class="h-40 w-40 flex items-center justify-center bg-gray-100 rounded text-gray-400">
                                        <i class="fas fa-qrcode text-4xl"></i>
                                    </div>
                                </div>
                                <p class="text-sm text-blue-600 font-medium flex items-center">
                                    <i class="fas fa-qrcode mr-2"></i> Scan to Donate
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bank Transfer -->
             <div data-aos=fade-left data-aos-duration="2000">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <div class="bg-gradient-to-r from-red-500 via-red-600 to-red-700 px-6 py-4" style="background-image: linear-gradient(to right, #ef4444, #dc2626, #b91c1c) !important;">
                        <div class="flex items-center space-x-3">
                            <div class="p-2.5 bg-white/20 rounded-lg">
                                <i class="fas fa-university text-white text-xl"></i>
                            </div>
                            <h2 class="text-xl font-bold text-white">BPI Bank Transfer</h2>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <i class="fas fa-university text-gray-400 w-5 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-500">Bank Name</p>
                                    <p class="font-medium text-gray-800">BPI</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-user-circle text-gray-400 w-5 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-500">Account Name</p>
                                    <p class="font-medium text-gray-800">Breakthrough Christian Fellowship Inc.</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-hashtag text-gray-400 w-5 mr-3"></i>
                                <div class="w-full">
                                    <p class="text-sm text-gray-500">Account Number</p>
                                    <p class="font-mono font-medium text-gray-800 bg-gray-50 p-2 rounded-md w-full">4733198249</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-wallet text-gray-400 w-5 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-500">Account Type</p>
                                    <p class="font-medium text-gray-800">Savings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Container - Impact of Your Donation -->
        <div class="mt-8 bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="!bg-black px-6 py-4" style="background-color: black !important;">
                <h2 class="text-xl font-bold text-white">How Your Donation Makes a Difference</h2>
            </div>
            <div class="p-6">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="h-16 w-16 mx-auto bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-hands-helping text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1">Community Support</h3>
                        <p class="text-sm text-gray-600">Helping local families in need through our outreach programs</p>
                    </div>
                    <div class="text-center p-4 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="h-16 w-16 mx-auto bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-book-bible text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1">Spiritual Growth</h3>
                        <p class="text-sm text-gray-600">Funding Bible studies and worship services</p>
                    </div>
                    <div class="text-center p-4 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="h-16 w-16 mx-auto bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-users text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1">Youth Programs</h3>
                        <p class="text-sm text-gray-600">Creating safe spaces for children and teenagers</p>
                    </div>
                    <div class="text-center p-4 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="h-16 w-16 mx-auto bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-hands-praying text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1">Missions</h3>
                        <p class="text-sm text-gray-600">Supporting local and international mission work</p>
                    </div>
                </div>
                
                <div class="mt-8 bg-blue-50 p-6 rounded-xl">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3 text-center">Your Generosity in Action</h3>
                    <p class="text-gray-700 text-center mb-4">
                        Every donation, no matter the size, helps us continue our mission. Thank you for being a part of our community and for your support.
                    </p>
                    <div class="flex justify-center gap-4 mt-4">
                        <a href="{{ route('about') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            <i class="fas fa-info-circle mr-1"></i> Learn More About Our Programs
                        </a>
                    </div>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <p class="text-sm text-gray-500 text-center">
                        Please include your name in the reference/message when making a transfer via bank or GCash for proper acknowledgment of your generous donation. Thank you for your support!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
