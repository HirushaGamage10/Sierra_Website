<?php $this->view("layout/header",$data);?>
<!--banner-->
<section class="pt-24 banner">
        <div class="text-center  bg-[url('assets/image/banner2.png')] bg-cover  h-[140px] items-center justify-center flex">
            <h1 class="text-3xl font-semibold text-white ">Men's Collection</h1>
        </div>    
    </section>

    <!-- Map Section -->
    <section class="py-16 category ">
        <div class="relative">
            <!-- Men Slider -->
            <div id="menSlider" class="grid grid-cols-2 px-4 overflow-hidden gap-x-10 gap-y-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 lg:px-8">
                
            <?php foreach($data['products'] as $product): ?>
                <div class="relative group" action= "Men">
                    <div class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1 lg:aspect-none lg:h-80">
                        <img src="<?php echo $product->product_image_1; ?>" alt="product image" class="object-cover object-center w-full h-full lg:h-full lg:w-full">
                    </div>
                    <div class="flex justify-between mt-4">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="/sierra/public/ProductPage?id=<?php echo $product->id; ?>" class="group-hover:text-red-500">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    <?php echo $product->product_name; ?>
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Rs <?php echo $product->product_price; ?></p>
                        </div>
                        <button class="mt-10">
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ff0000;"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>  
    </section>
 


           
<?php $this->view("layout/footer",$data);?>



