<?php $this->view("layout/side", $data); ?>

<div class="flex-1 ml-64">
            
            <!-- Header -->
            <header class="sticky top-0 z-10 flex items-center justify-between p-4 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-700">Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <i class="fa-regular fa-circle-user fa-lg"></i>
                    <span class="font-serif text-lg text-red-500">Hi, <?php echo $_SESSION['name']?></span>
                </div>
            </header>

            <!-- Main Content -->
            <main class="p-4 overflow-y-auto max-h-[calc(100vh-64px)]">
                <!-- Summary Cards -->
                <div class="grid grid-cols-3 gap-8 mb-3">
                    <div class="p-4 text-center bg-gray-200 rounded-lg">
                        <h3 class="font-medium text-gray-700">Total Orders</h3>
                        <p class="text-2xl font-semibold text-gray-800">4</p>
                    </div>
                    <div class="p-4 text-center bg-gray-200 rounded-lg">
                        <h3 class="font-medium text-gray-700">Total Active Products</h3>
                        <p class="text-2xl font-semibold text-gray-800">20</p>
                    </div>
                    <div class="p-4 text-center bg-gray-200 rounded-lg">
                        <h3 class="font-medium text-gray-700">Total</h3>
                        <p class="text-2xl font-semibold text-gray-800">20</p>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="flex items-center justify-between p-4 mb-8 text-center bg-gray-300 rounded-lg">
                    <h3 class="font-medium text-gray-700">Total Revenue</h3>
                    <div class="px-4 py-2 text-gray-800 bg-yellow-400 rounded-lg">Rs. 23,000</div>
                </div>

                <!-- Orders Table -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <div class="grid grid-cols-3 gap-4 mb-4 font-semibold text-gray-600">
                        <span>CUSTOMER</span>
                        <span>ITEM</span>
                        <span>PAYMENTS</span>
                    </div>

                    <div class="space-y-4">
                        
                        <div class="grid items-center grid-cols-3 p-4 bg-gray-100 rounded-lg">
                            <span class="text-gray-700">Hirusha Gamage</span>
                            <div class="flex items-center">
                                <img src="assets/image/product/men/product4.png" alt="Product Image" class="w-12 mr-4 rounded-lg h-13">
                                <div>
                                    <p class="text-gray-700">LEVI'S HOUSEMARK POLO SHIRT</p>
                                    <p class="text-gray-500">Rs. 3490.00</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="ml-10 text-green-600">Paid</span>
                                <button class="flex items-center px-3 py-1 ml-4 text-gray-700 bg-gray-200 rounded-lg">
                                    View 
                                </button>
                            </div>
                        </div>
                        <div class="grid items-center grid-cols-3 p-4 bg-gray-100 rounded-lg">
                            <span class="text-gray-700">Hirusha Gamage</span>
                            <div class="flex items-center">
                                <img src="assets/image/product/men/product4.png" alt="Product Image" class="w-12 mr-4 rounded-lg h-13">
                                <div>
                                    <p class="text-gray-700">LEVI'S HOUSEMARK POLO SHIRT</p>
                                    <p class="text-gray-500">Rs. 3490.00</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="ml-10 text-green-600">Paid</span>
                                <button class="flex items-center px-3 py-1 ml-4 text-gray-700 bg-gray-200 rounded-lg">
                                    View 
                                </button>
                            </div>
                        </div>
                        
                        <!-- Repeat for more orders -->
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
