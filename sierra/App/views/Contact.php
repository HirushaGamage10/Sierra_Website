
<?php $this->view("layout/header",$data);?>

   <section class="pt-24 banner">
        <div class="text-center  bg-[url('assets/image/banner6.png')] bg-cover  h-[140px] items-center justify-center flex">
            <h1 class="text-3xl font-semibold text-white ">LET'S CHAT</h1>
        </div>    
    </section>


    <!--brand details-->
    <section class="bg-gray-100 banner">
        <div class="p-6 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Contact Information -->
                <div>
                    <h2 class="mb-2 text-sm font-semibold text-red-500 uppercase">Information</h2>
                    <h1 class="mb-4 text-3xl font-bold text-gray-800">Contact Us</h1>
                    <p class="mb-6 text-[15px] text-gray-600">
                        As you might expect of a company that began as a high-end interiors contractor, we pay strict attention.
                    </p>
                    <div class="mb-6">
                        <h3 class="mb-2 text-lg font-semibold text-gray-800">Sierra Fashion - Head Branch</h3>
                        <ul class="space-y-2 text-gray-600 ml-7">
                            <li class="flex items-center text-sm"><i class="pr-6 fa-solid fa-location-dot fa-sm"></i> 23/B, Kadawatha Road, Colombo 07</li>
                            <li class="flex items-center text-sm"><i class="pr-6 fa-solid fa-phone fa-sm"></i> +94-761180203 / 011-3345432</li>
                            <li class="flex items-center text-sm"><i class="pr-6 fa-solid fa-envelope fa-sm"></i> sierraheadbranch@gmail.com</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="mb-2 text-lg font-semibold text-gray-800">Sierra Fashion - Gampaha Branch</h3>
                        <ul class="space-y-2 text-gray-600 ml-7">
                            <li class="flex items-center text-sm"><i class="pr-6 fa-solid fa-location-dot fa-sm"></i> 143/20, Yakkala Road, Gampaha</li>
                            <li class="flex items-center text-sm"><i class="pr-6 fa-solid fa-phone fa-sm"></i> +94-766495581 / 033-2245455</li>
                            <li class="flex items-center text-sm"><i class="pr-6 fa-solid fa-envelope fa-sm"></i>sierragampahabranch@gmail.com</li>
                        </ul>
                    </div>
                </div>
    
                <!-- Contact Form -->
                <div class="pt-14">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <form action="#">
                            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                                <div>
                                    <label class="block mb-1 text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" class="w-full px-3 py-2 text-sm font-normal text-gray-500 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Name" required>
                                </div>
                                <div>
                                    <label class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
                                    <input type="email" class="w-full px-3 py-2 text-sm font-normal text-gray-500 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 text-sm font-medium text-gray-700">Message</label>
                                <textarea class="w-full px-3 py-2 text-sm font-normal text-gray-500 border rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Message" rows="6" required></textarea>
                            </div>
                            <button class="w-full py-3 text-white bg-gray-600 rounded-xl hover:bg-gray-700">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    

    <!-- Map Section -->
    <section class="bg-gray-100">
        <div class="flex justify-center py-8">
            <div class="relative border border-gray-300 shadow-lg w-full max-w-[1100px] h-0 pb-[31.82%] sm:pb-[31.82%] rounded-2xl">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d253453.98708054624!2d79.88609127812501!3d6.983515748052597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1725234343347!5m2!1sen!2slk" 
                        class="absolute inset-0 w-full h-full border-0 rounded-2xl" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

<?php $this->view("layout/footer",$data);?>
    
    