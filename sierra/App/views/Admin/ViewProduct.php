<?php $this->view("layout/side", $data); ?>

  <!-- Main Content Area -->
<div class="flex justify-center flex-1 ml-64 banner">
    <div class="w-full max-w-5xl bg-gray-100">
        <h2 class="pt-6 text-2xl font-semibold text-center text-gray-700">View Products</h2>
        <div class="flex justify-center mt-1 mb-6">
            <div class="w-20 h-1 bg-red-500"></div>
        </div>

        <div class="col-span-1 p-6 mt-6 bg-white rounded-lg shadow-lg md:col-span-2">
            <table class="w-full border border-collapse border-gray-300">
                <thead>
                    <tr class="text-gray-500 bg-blue-300">
                        <th class="p-3 border-b">Image</th>
                        <th class="p-3 border-b">Name</th>
                        <th class="p-3 border-b">Category</th>
                        <th class="p-3 border-b">Price</th>
                        <th class="p-3 border-none"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['products'] as $product): ?>
                    <tr>
                        <td class="p-3 border border-gray-300">
                            <img src="<?php echo $product->product_image_1; ?>" alt="product image" class="w-20 h-20">
                        </td>
                        <td class="p-3 text-sm font-medium border border-gray-300"><?php echo $product->product_name; ?></td>
                        <td class="p-3 text-sm font-medium border border-gray-300"><?php echo $product->product_category; ?></td>
                        <td class="p-3 text-sm font-medium border border-gray-300"><?php echo $product->product_price; ?></td>
                        <td class="p-3 text-sm font-medium border border-gray-300">
                            <div class="flex justify-around">
                                <a href="?edit=<?php echo $product->id; ?>" class="px-4 py-2 font-medium text-white bg-green-300 rounded-lg hover:bg-green-400">Edit</a>

                                <!-- Delete Form -->
                                <form method="POST" action="<?php echo BASE_URL . '/deleteproduct'; ?>">
                                    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                    <button type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this product?');" class="px-4 py-2 font-medium text-white bg-red-300 rounded-lg hover:bg-red-400">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


   <!-- Edit Product Modal -->
<?php
if (isset($_GET['edit'])) {
    $productId = $_GET['edit'];
    $product = $this->model('ProductModel')->updateProductdetails($productId);
    if ($product) {
        $productSizes = explode(',', $product->size); 
        $productColors = explode(',', $product->color);
?>

    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-sm p-4 mx-auto bg-white rounded-lg shadow-lg">
            <h3 class="mb-3 text-lg font-semibold text-center text-gray-700">Edit Product</h3>

            <form method="POST" action="<?php echo BASE_URL . '/updateproduct'; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">

                <div class="space-y-3">
                    <div>
                        <label for="editProductName" class="block text-sm font-medium text-gray-600">Product Name</label>
                        <input type="text" name="product_name" id="editProductName" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $product->product_name; ?>" required>
                    </div>

                    <div>
                        <label for="editProductCategory" class="block text-sm font-medium text-gray-600">Product Category</label>
                        <select name="product_category" id="editProductCategory" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">Select Category</option>
                            <option value="Men" <?php if ($product->product_category == 'Men') echo 'selected'; ?>>Men</option>
                            <option value="Women" <?php if ($product->product_category == 'Women') echo 'selected'; ?>>Women</option>
                            <option value="Kids" <?php if ($product->product_category == 'Kids') echo 'selected'; ?>>Kids</option>
                            <option value="Accessories" <?php if ($product->product_category == 'Accessories') echo 'selected'; ?>>Accessories</option>
                        </select>
                    </div>

                    <div>
                        <label for="editProductPrice" class="block text-sm font-medium text-gray-600">Price</label>
                        <input type="number" name="product_price" id="editProductPrice" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $product->product_price; ?>" required>
                    </div>

                    <div>
                        <label for="editProductStock" class="block text-sm font-medium text-gray-600">Stock</label>
                        <input type="text" name="product_stock" id="editProductStock" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $product->product_stock; ?>" required>
                    </div>

                    <div class="mt-4">
                        <label for="editSize" class="block">Size</label>
                        <div id="editSize" class="flex space-x-2">
                            <?php
                            $sizes = ['XS', 'S']; // Assuming these are the available sizes
                            foreach ($sizes as $size) {
                                $isChecked = in_array($size, $productSizes) ? 'checked' : ''; // Check if the size is selected
                                echo "
                                <label class='flex items-center space-x-2'>
                                    <input type='checkbox' name='size[]' value='$size' class='text-green-600 form-checkbox focus:ring-0' $isChecked>
                                    <span class='text-gray-700'>$size</span>
                                </label>
                                ";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="editColor" class="block">Color</label>
                        <div id="editColor" class="flex space-x-2">
                            <?php
                            $colors = ['Red', 'Green']; // Assuming these are the available colors
                            foreach ($colors as $color) {
                                $isChecked = in_array($color, $productColors) ? 'checked' : ''; // Check if the color is selected
                                echo "
                                <label class='flex items-center space-x-2'>
                                    <input type='checkbox' name='color[]' value='$color' class='text-green-600 form-checkbox focus:ring-0' $isChecked>
                                    <span class='text-gray-700'>$color</span>
                                </label>
                                ";
                            }
                            ?>
                        </div>
                    </div>

                    <div>
                        <label for="editProductDescription" class="block text-sm font-medium text-gray-600">Product Description</label>
                        <textarea name="product_description" id="editProductDescription" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required><?php echo $product->product_description; ?></textarea>
                    </div>

                    <div>
                        <label for="editProduct_image_1" class="block text-sm font-medium text-gray-600">Product Image</label>
                        <input type="file" name="product_image_1" id="editProduct_image_1" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" ><?php echo $product->product_image_1; ?></input>
                        <img src="<?php echo $product->product_image_1; ?>" alt="product image" class="w-20 h-20">
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="?" class="px-4 py-2 mr-2 text-white bg-gray-400 rounded-lg hover:bg-gray-800">Cancel</a>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-800">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
    } else {
        echo "<p class='text-center text-red-500'>Product not found.</p>";
    }
}
?>
