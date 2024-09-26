
<?php $this->view("layout/side", $data); ?>

<!-- Main Content Area -->
<div class="flex justify-center flex-1 ml-64 banner">
    <div class="w-full max-w-5xl bg-gray-100">
        <h2 class="pt-6 text-2xl font-semibold text-center text-gray-700">Admins</h2>
        <div class="flex justify-center mt-1 mb-6">
            <div class="w-20 h-1 bg-red-500"></div>
        </div>

        <!-- Admin List Table -->
        <div class="col-span-1 p-6 mt-6 bg-white rounded-lg shadow-lg md:col-span-2">
            <table class="w-full border border-collapse border-gray-300">
                <thead>
                    <tr class="text-gray-500 bg-blue-300">
                        <th class="p-3 border-b">Admin ID</th>
                        <th class="p-3 border-b">Name</th>
                        <th class="p-3 border-b">Email</th>
                        <th class="p-3 border-none"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['admins'] as $admin): ?>
                    <tr>
                        <td class="p-3 text-sm font-medium border border-gray-300"><?php echo $admin->id; ?></td>
                        <td class="p-3 text-sm font-medium border border-gray-300"><?php echo $admin->name; ?></td>
                        <td class="p-3 text-sm font-medium border border-gray-300"><?php echo $admin->email; ?></td>
                        <td class="p-3 text-sm font-medium border border-gray-300">
                            <div class="flex justify-around">
                                <!-- Edit Admin -->
                                <a href="?edit=<?php echo $admin->id; ?>" class="px-4 py-2 font-medium text-white bg-green-300 rounded-lg hover:bg-green-400">Edit</a>

                                <!-- Delete Admin Form -->
                                <form method="POST" action="<?php echo BASE_URL . '/deleteAdmin'; ?>">
                                    <input type="hidden" name="id" value="<?php echo $admin->id; ?>">
                                    <button type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this admin?');" class="px-4 py-2 font-medium text-white bg-red-300 rounded-lg hover:bg-red-400">
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

        <!-- Add Admin Button -->
        <div class="mt-6 text-center">
            <a href="?add=admin" class="px-6 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700">Add Admin</a>
        </div>
    </div>
</div>

<!-- Add Admin Form (Conditional PHP Check for 'add=admin') -->
<?php
if (isset($_GET['add']) && $_GET['add'] == 'admin') {
?>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-md p-4 mx-auto bg-white rounded-lg shadow-lg">
            <h3 class="mb-3 text-lg font-semibold text-center text-gray-700">Add New Admin</h3>

            <!-- Add Admin Form -->
            <form method="POST" action="<?php echo BASE_URL . '/addAdmin'; ?>">
                <div class="space-y-3">
                    <div>
                        <label for="adminName" class="block text-sm font-medium text-gray-600">Admin Name</label>
                        <input type="text" name="name" id="adminName" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                    </div>

                    <div>
                        <label for="adminEmail" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" name="email" id="adminEmail" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                    </div>

                    <div>
                        <label for="adminPassword" class="block text-sm font-medium text-gray-600">Password</label>
                        <input type="password" name="password" id="adminPassword" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-800">Add Admin</button>
                        <a href="?" class="px-4 py-2 ml-2 text-white bg-gray-400 rounded-lg hover:bg-gray-800">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>

<!-- Edit Admin -->
<?php
if (isset($_GET['edit'])) {
    $adminId = $_GET['edit'];
    $admin = $this->model('AdminModel')->updateAdmindetails($adminId);
    if ($admin) {
?>

<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="w-full max-w-md p-4 mx-auto bg-white rounded-lg shadow-lg">
        <h3 class="mb-3 text-lg font-semibold text-center text-gray-700">Edit Admin</h3>

        <!-- Edit Admin Form -->
        <form method="POST" action="<?php echo BASE_URL . '/updateAdmin'; ?>">
            <input type="hidden" name="id" value="<?php echo $admin->id; ?>">
            <div class="space-y-3">
                <div>
                    <label for="editName" class="block text-sm font-medium text-gray-600">Name</label>
                    <input type="text" name="name" id="editName" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $admin->name; ?>" required>
                </div>

                <div>
                    <label for="editEmail" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" id="editEmail" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $admin->email; ?>" required>
                </div>

                <div>
                    <label for="editPassword" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="text" name="password" id="editPassword" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-800">Update Admin</button>
                    <a href="?" class="px-4 py-2 ml-2 text-white bg-gray-400 rounded-lg hover:bg-gray-800">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    } else {
        echo "<p class='text-center text-red-500'>Admin not found.</p>";
    }
}
?>
