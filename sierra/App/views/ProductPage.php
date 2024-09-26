<?php $this->view("layout/header", $data); ?>

<section class="pl-2 pt-28">
    <button onclick="window.history.back()" class="flex items-center space-x-2 text-lg font-medium text-black">
        <i class="fa-solid fa-angle-left"></i>
        <span>Back</span>
    </button>
</section>

<?php $product = $data['product']; ?>

<section class="category">
    <div class="py-6 sm:py-6 lg:py-6">
        <div class="max-w-screen-xl px-4 mx-auto md:px-8">
            <div class="grid gap-8 md:grid-cols-2">
                <!-- images - start -->
                <div class="grid gap-4 lg:grid-cols-5">
                    <div class="flex order-last gap-4 lg:order-none lg:flex-col">
                        <div class="overflow-hidden bg-gray-100 rounded-lg">
                            <img src="<?php echo $product->product_image_1; ?>" alt="Thumbnail 1" class="object-cover object-center w-full h-full thumbnail">
                        </div>

                        <div class="overflow-hidden bg-gray-100 rounded-lg thumbnail">
                            <img src="<?php echo $product->product_image_1; ?>" alt="Thumbnail 2" class="object-cover object-center w-full h-full thumbnail">
                        </div>

                        <div class="overflow-hidden bg-gray-100 rounded-lg thumbnail">
                            <img src="assets/image/product/men/product3.png" alt="Thumbnail 3" class="object-cover object-center w-full h-full thumbnail">
                        </div>
                    </div>

                    <div class="relative overflow-hidden bg-gray-100 rounded-lg lg:col-span-4">
                        <img id="mainImage" src="<?php echo $product->product_image_1; ?>" loading="lazy" alt="Product Image" class="object-cover object-center w-full h-full" />
                    </div>
                </div>

                <!-- product details - start -->
                <div class="md:py-8">
                    <div class="mb-2 md:mb-3">
                        <h1 class="mb-2 text-2xl font-semibold md:text-3xl"><?php echo $product->product_name; ?></h1>
                        <p class="font-normal text-gray-600">SKU: <?php echo $product->id; ?></p>
                        <p class="mt-4 mb-6 text-xl font-semibold md:text-2xl">Rs <?php echo $product->product_price; ?></p>
                    </div>

                    <!-- Size selection -->
                    <div class="flex flex-col items-center pb-3 mb-4 md:flex-row">
                        <span class="mb-2 text-gray-700 md:mb-0">Size :</span>
                        <div id="size-options" class="flex ml-0 space-x-2 md:ml-4">
                            <?php foreach ($product->sizes as $size): ?>
                                <button class="px-4 py-2 font-semibold text-black border rounded-full size-option focus:outline-none" data-size="<?php echo $size; ?>">
                                    <?php echo $size; ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <a href="#" class="mt-2 ml-0 text-blue-600 md:ml-4 md:mt-0">Size guide</a>
                    </div>

                    <!-- Color selection -->
                    <div class="flex flex-col items-center pb-3 mb-4 md:flex-row">
                        <span class="mb-2 text-gray-700 md:mb-0">Color :</span>
                        <div id="color-options" class="flex ml-0 space-x-2 md:ml-4">
                            <?php foreach ($product->colors as $color): ?>
                                <button class="w-8 h-8 rounded-full color-option focus:outline-none" style="background-color: <?php echo $color; ?>" data-color="<?php echo $color; ?>"></button>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Quantity selection -->
                    <div class="flex items-center mb-6">
                        <span class="text-gray-700">Quantity :</span>
                        <div class="flex items-center ml-4 space-x-2 border border-black rounded-md">
                            <button id="decrement" class="px-4 py-2 text-black focus:outline-none">-</button>
                            <span id="quantity" class="font-semibold text-black">1</span>
                            <input type="hidden" name="quantity" id="quantityInput" value="1">
                            <button id="increment" class="px-4 py-2 text-black focus:outline-none">+</button>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:space-x-4">
                        <form id="add-to-cart-form" method="POST" action="addtocart"> <!-- Adjust action URL -->
                            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product->product_name; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $product->product_price; ?>">
                            <input type="hidden" name="size" id="selectedSize" value="">
                            <input type="hidden" name="color" id="selectedColor" value="">
                            <input type="hidden" name="quantity" id="selectedQuantity" value="1">
                            
                            

                            
                            <button type="submit" class="flex items-center justify-center px-6 py-3 space-x-2 font-medium text-white bg-black rounded focus:outline-none">
                                <i class="fa-solid fa-bag-shopping" style="color: #ffffff;"></i>
                                <span>Add to cart</span>
                            </button>
                        </form>
                        <button class="px-6 py-3 font-medium text-white bg-black rounded focus:outline-none">Buy it now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="category">
    <div class="flex justify-center border-b border-gray-200">
        <nav class="flex -mb-px space-x-8 " aria-label="Tabs">
            <button id="descriptionTab" class="px-1 py-4 text-sm font-medium text-gray-500 border-b-2 border-black tab text-black-900 border-black-500">
                Product description
            </button>
            <button id="additionalInfoTab" class="px-1 py-4 text-sm font-medium text-gray-500 border-b-2 tab hover:text-gray-700">
                Additional information
            </button>
            <button id="reviewsTab" class="px-1 py-4 text-sm font-medium text-gray-500 border-b-2 tab hover:text-gray-700">
                Product reviews
            </button>
        </nav>
    </div>
    <!-- Tab Content -->
    <div class="max-w-3xl py-10 mx-auto mt-6">
        <div id="descriptionContent" class="flex justify-center content">
            <p><?php echo $product->product_description; ?></p>
        </div>

        <div id="additionalInfoContent" class="hidden content">
            <p>Additional information goes here...</p>
        </div>

        <div id="reviewsContent" class="hidden content">
            <p>Product reviews go here...</p>
        </div>
    </div>
</section>



<?php $this->view("layout/footer", $data); ?>
