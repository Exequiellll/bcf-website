@extends('layouts.app')

@section('title', 'Join Our Community - BCF Church Fellowship')
@section('meta_description', 'Join BCF Church Fellowship and become part of our growing community of believers. Connect, grow, and serve together.')

@section('content')
<!-- Hero Section -->
<section class="relative py-10 overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuLWJnIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSgzMCkiPjxyZWN0IHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuLWJnKSIvPjwvc3ZnPg==')] animate-pulse"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
    <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-1/4 left-1/2 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center py-10 md:py-24">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight" data-aos="fade-up" data-aos-duration="800">Join Our Growing <span class="text-blue-300">Community</span></h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto mb-10 opacity-90" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">Become part of our faith family and experience love, support, and spiritual growth together.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">

            </div>
        </div>
    </div>
    
<div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-white to-transparent"></div>
</section>

<!-- Why Join Section -->
<section class="py-3 bg-white">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 right-0 h-24 bg-gradient-to-b from-blue-50 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-blue-50 to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Experience <span class="text-blue-600">Loveable</span> Community</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="p-2 relative z-10">
                    <div class="h-1.5 bg-gradient-to-r from-blue-500 to-blue-300 rounded-t-lg transition-all duration-500 group-hover:from-white group-hover:to-blue-100"></div>
                </div>
                <div class="p-8 text-center relative z-10">
                    <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-white group-hover:bg-opacity-20 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 group-hover:text-white transition-colors duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white transition-colors duration-500 mb-3">Spiritual Growth</h3>
                    <p class="text-gray-600 group-hover:text-blue-50 transition-colors duration-500">Engage in meaningful worship and Bible study to deepen your faith and understanding of God's word.</p>
                    <div class="mt-6">
                        <span class="inline-flex items-center text-sm font-medium text-blue-600 group-hover:text-blue-200 transition-colors duration-500">
                            Learn more
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-teal-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="p-2 relative z-10">
                    <div class="h-1.5 bg-gradient-to-r from-green-500 to-green-300 rounded-t-lg transition-all duration-500 group-hover:from-white group-hover:to-green-100"></div>
                </div>
                <div class="p-8 text-center relative z-10">
                    <div class="w-20 h-20 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-white group-hover:bg-opacity-20 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600 group-hover:text-white transition-colors duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253m0-13V18" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white transition-colors duration-500 mb-3">Biblical Teaching</h3>
                    <p class="text-gray-600 group-hover:text-green-50 transition-colors duration-500">Learn from passionate teachers who bring the Bible to life with practical applications for daily living.</p>
                    <div class="mt-6">
                        <span class="inline-flex items-center text-sm font-medium text-green-600 group-hover:text-green-200 transition-colors duration-500">
                            Learn more
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="p-2 relative z-10">
                    <div class="h-1.5 bg-gradient-to-r from-purple-500 to-purple-300 rounded-t-lg transition-all duration-500 group-hover:from-white group-hover:to-purple-100"></div>
                </div>
                <div class="p-8 text-center relative z-10">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-white group-hover:bg-opacity-20 group-hover:text-white transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-purple-600 group-hover:text-white transition-colors duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white transition-colors duration-500 mb-3">Loving Community</h3>
                    <p class="text-gray-600 group-hover:text-purple-50 transition-colors duration-500">Connect with a supportive community that cares for one another and grows together in faith.</p>
                    <div class="mt-6">
                        <span class="inline-flex items-center text-sm font-medium text-purple-600 group-hover:text-purple-200 transition-colors duration-500">
                            Learn more
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Get Involved -->
<section class="py-10 bg-white">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-5">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuLWJnIiB3aWR0aD0iODAiIGhlaWdodD0iODAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSgxNSkiPjxyZWN0IHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgZmlsbD0icmdiYSgxMDIsMTI2LDIzNCwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuLWJnKSIvPjwvc3ZnPg==')]"></div>
    </div>
    
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">How to <span class="text-blue-600">Get Involved</span></h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">Take the next step in your spiritual journey with us</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <!-- Timeline -->
                <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-200 to-indigo-200"></div>
                
                <div class="space-y-10 relative">
                    <!-- Step 1 -->
                    <div class="flex items-start group" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-lg shadow-lg transform transition-all duration-300 group-hover:scale-110">
                            <span class="relative z-10">1</span>
                            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="ml-6 pt-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">Attend a Service</h3>
                            <p class="text-gray-600">Join us for worship this Sunday. We have multiple service times to fit your schedule and a special program for kids.</p>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="flex items-start group" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-lg shadow-lg transform transition-all duration-300 group-hover:scale-110">
                            <span class="relative z-10">2</span>
                            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="ml-6 pt-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">Connect With Us</h3>
                            <p class="text-gray-600">Fill out the connection card, visit our welcome center, or join us for our next Newcomers Lunch to learn more about our church family.</p>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="flex items-start group" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-lg shadow-lg transform transition-all duration-300 group-hover:scale-110">
                            <span class="relative z-10">3</span>
                            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="ml-6 pt-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">Join a Group</h3>
                            <p class="text-gray-600">Find your place in one of our small groups, Bible studies, or ministry teams that match your interests and spiritual gifts.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 pl-18" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('join-us') }}" 
                        class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:shadow-blue-100 hover:-translate-y-1"
                    >
                        <span>Join Our Community</span>
                        <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Right Side - Image Card -->
            <div class="relative" data-aos="fade-left" data-aos-delay="200">
                <div class="relative z-10 bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 transform hover:shadow-2xl transition-all duration-500" data-aos="fade-right">
                    <div class="aspect-w-16 aspect-h-12 rounded-t-2xl overflow-hidden">
                        <img 
                            src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" 
                            alt="Church community worshiping together" 
                            class="w-full h-full object-cover transform transition-transform duration-700 hover:scale-105"
                            loading="lazy"
                        >
                        
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-semibold text-gray-900">Service Times</h4>
                                    <p class="text-gray-600">Sundays at 9:00 AM & 11:00 AM</p>
                                    <p class="text-sm text-gray-500 mt-1">Wednesday Bible Study at 7:00 PM</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-semibold text-gray-900">Location</h4>
                                    <p class="text-gray-600">123 Faith Avenue</p>
                                    <p class="text-gray-600">City, State 12345</p>
                                    <a href="https://maps.app.goo.gl/3QoVBYcqE4saYw4u7" target = "blank" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm mt-1">
                                        Get Directions
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-blue-100 rounded-full opacity-20 -z-10"></div>
                <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-indigo-100 rounded-full opacity-20 -z-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class=" bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 mt-12">Hear From Our Members</h2>
           
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-50 p-8 rounded-xl relative">
                <div class="absolute -top-6 -left-6 w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl">"</div>
                <p class="text-gray-700 mb-6 relative z-10">Joining this church was the best decision we've made. The community is so welcoming and the teachings are life-changing.</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden mr-4">
                        <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah Johnson" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Sarah Johnson</h4>
                        <p class="text-sm text-gray-600">Member since 2019</p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-gray-50 p-8 rounded-xl relative">
                <div class="absolute -top-6 -left-6 w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl">"</div>
                <p class="text-gray-700 mb-6 relative z-10">I was new in town and found a family here. The small groups helped me make friends and grow in my faith.</p>
                <div class="flex items-center mt-8">
                    <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden mr-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Michael Chen</h4>
                        <p class="text-sm text-gray-600">Member since 2021</p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="bg-gray-50 p-8 rounded-xl relative">
                <div class="absolute -top-6 -left-6 w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl">"</div>
                <p class="text-gray-700 mb-6 relative z-10">The children's ministry is amazing! My kids love coming to church and learning about Jesus in such a fun way.</p>
                <div class="flex items-center mt-8">
                    <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden mr-4">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Jessica Williams" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">Jessica Williams</h4>
                        <p class="text-sm text-gray-600">Member since 2018</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-20 bg-gradient-to-r from-blue-700 to-blue-900 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Join Our Church Family?</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">Take the first step today and become part of our growing community of faith.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('join-us') }}" 
                class="inline-block bg-white text-blue-700 hover:bg-blue-50 font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg"
            >
                Join Us Now
            </a>
            <a 
                href="{{ route('about') }}"
                class="bg-transparent border-2 border-white text-white hover:bg-white hover:bg-opacity-10 font-bold py-4 px-8 rounded-lg transition-all duration-300"
            >
                Contact Us
            </a>
        </div>
    </div>
</section>


@endsection
