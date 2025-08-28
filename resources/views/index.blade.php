@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-between bg-gray-50 font-sans">
    <!-- Header Section -->
    <header class="bg-white p-6 flex justify-between items-center">
        <div class="text-red-500 text-2xl font-bold flex items-center">
            NGO Connect
        </div>
        <div class="space-x-4">
            <a href="#" class="text-gray-600 hover:text-gray-800">Login</a>
            <a href="#" class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800">Register</a>
        </div>
    </header>

    <!-- Hero Section-->
    <section class="text-center py-14 px-4 bg-gray-50">
        <h1 class="text-5xl font-bold text-gray-800">Connecting NGOs with Supporters Worldwide</h1>
        <p class="mt-4 text-lg text-gray-600 max-w-xl mx-auto">A dedicated social platform where NGOs can share their work, organize events, and connect with volunteers and donors to create meaningful impact.</p>
        <div class="mt-6 space-x-4">
            <a href="{{ route('register') }}" class="bg-black text-white px-6 py-3 rounded-md hover:bg-gray-800">Join Now</a>
        </div>
    </section>

    <!-- Features Section-->
    <section class="py-8 px-4">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 bg-white rounded-lg shadow-md text-left">
                <svg class="w-8 h-8 text-red-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">NGO Newsfeed</h3>
                <p class="mt-2 text-gray-600">Stay updated with posts, images, and videos from NGOs you follow. Like, comment, and share to show your support.</p>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md text-left">
                <svg class="w-8 h-8 text-red-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM3 8a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Volunteer Opportunities</h3>
                <p class="mt-2 text-gray-600">Find and register for volunteer opportunities with NGOs working on causes you care about.</p>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md text-left">
                <svg class="w-8 h-8 text-red-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Events & Campaigns</h3>
                <p class="mt-2 text-gray-600">Discover upcoming events, fundraising campaigns, and initiatives organized by NGOs worldwide.</p>
            </div>

                <div class="p-6 bg-white rounded-lg shadow-md text-left">
                <svg class="w-8 h-8 text-red-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm10 3a1 1 0 11-2 0 1 1 0 012 0zm-4 0a1 1 0 11-2 0 1 1 0 012 0zm2 4a1 1 0 100-2 1 1 0 000 2zm-4 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">NGO Analytics</h3>
                <p class="mt-2 text-gray-600">NGOs get powerful insights into their reach, engagement, and impact to optimize their efforts.</p>
            </div>
            
            <div class="p-6 bg-white rounded-lg shadow-md text-left">
                <svg class="w-8 h-8 text-red-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM12 18a2 2 0 11-4 0h4z" clip-rule="evenodd" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Secure Donations</h3>
                <p class="mt-2 text-gray-600">Support causes you care about with secure, integrated payment options for one-time or recurring donations.</p>
            </div>

        </div>
    </section>

    <!-- How It Works Section-->
    <section class="py-16 px-4 bg-white">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">How It Works</h2>
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
          
            <div class="p-6 bg-gray-50 rounded-lg shadow-md text-left">
                <div class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center mb-4">1</div>
                <h3 class="text-xl font-semibold text-gray-800">Create Your Profile</h3>
                <p class="mt-2 text-gray-600">Sign up as an NGO or supporter and create your profile with relevant information about your organization or interests.</p>
            </div>

            <div class="p-6 bg-gray-50 rounded-lg shadow-md text-left">
                <div class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center mb-4">2</div>
                <h3 class="text-xl font-semibold text-gray-800">Connect & Engage</h3>
                <p class="mt-2 text-gray-600">Follow NGOs, browse the newsfeed, engage with content, and discover events and volunteer opportunities.</p>
            </div>

            <div class="p-6 bg-gray-50 rounded-lg shadow-md text-left">
                <div class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center mb-4">3</div>
                <h3 class="text-xl font-semibold text-gray-800">Make an Impact</h3>
                <p class="mt-2 text-gray-600">Donate to causes, volunteer for events, or if you're an NGO, share updates and organize campaigns to drive change.</p>
            </div>

        </div>
    </section>

   <!-- Impact Section-->
    <section class="text-center py-20 px-4 bg-gray-50">
        <h1 class="text-4xl font-bold text-gray-800">Ready to Make an Impact?</h1>
        <p class="mt-4 text-lg text-gray-600 max-w-md mx-auto">Join our growing community of NGOs and supporters working together for positive change.</p>
        <button class="mt-6 bg-black text-white px-8 py-3 rounded-md hover:bg-gray-800">Get Started</button>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-200 py-6 px-4 text-center">
        <div class="flex justify-center space-x-8 mb-4">
            <span class="text-red-500 flex items-center">
                NGO Connect
            </span>
            <a href="#" class="text-gray-600 hover:text-gray-800">About</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Contact</a>
        </div>
        <p class="text-gray-500 text-sm">&copy; 2025 NGO Connect. All rights reserved.</p>
    </footer>
</div>
@endsection