<div class="bg-gray-100 flex justify-center items-center h-[80%]">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
            <!-- Logout Link -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold text-center text-gray-800">Campaign Details</h1>
            </div>

            <!-- Table Start -->
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Client</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($campaign as $row) {
                        print_r($campaign); die;
                    ?>

                        <tr class="border-b">
                            <td class="px-4 py-2"><?php echo $row->id; ?></td>
                            <td class="px-4 py-2"><?php echo $row->name; ?></td>
                            <td class="px-4 py-2"><?php echo $row->description; ?></td>
                            <td class="px-4 py-2"><?php echo $row->client; ?></td>
                            <td class="px-4 py-2 text-center">
                                <!-- Edit Button with Data -->
                                <button
                                    class="bg-blue-500 text-white py-1 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 mr-2"
                                    onclick="openEditModal(<?php echo $row->id; ?>, '<?php echo $row->name; ?>', '<?php echo $row->description; ?>' , '<?php echo $row->client; ?>')">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>

                                <!-- Delete Button with Data -->
                                <button
                                    class="bg-red-500 text-white py-1 px-4 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                                    onclick="confirmDelete(<?php echo $row->id; ?>)">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Table End -->

             <!-- pagination start -->
        <div class="flex justify-center mt-6">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex items-center -space-x-px">
                    <!-- Previous Button -->
                    <?php if ($currentPage > 1): ?>
                        <li>
                            <a href="/dashboard?page=<?php echo $currentPage - 1; ?>&searchQuery=<?php echo urlencode($searchQuery); ?>" class="px-4 py-2 text-indigo-600 hover:text-indigo-900 rounded-l-lg">
                                Previous
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Pagination Links -->
                    <?php
                    // Determine the page range to display
                    $pageRange = 2;
                    $startPage = max(1, $currentPage - floor($pageRange / 2));
                    $endPage = min($totalPages, $currentPage + floor($pageRange / 2));

                    // Add "Previous Ellipsis" if the range starts before 1
                    if ($startPage > 1) {
                        echo '<li><a href="/dashboard?page=1&searchQuery=' . urlencode($searchQuery) . '" class="px-4 py-2 text-indigo-600 hover:text-indigo-900">1</a></li>';
                        if ($startPage > 2) {
                            echo '<li><span class="px-4 py-2 text-gray-400">...</span></li>';
                        }
                    }

                    // Loop through the pages
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo '<li>';
                        echo '<a href="/dashboard?page=' . $i . '&searchQuery=' . urlencode($searchQuery) . '" class="px-4 py-2 text-indigo-600 hover:text-indigo-900 ' . ($i == $currentPage ? 'font-bold' : '') . '">';
                        echo $i;
                        echo '</a>';
                        echo '</li>';
                    }

                    // Add "Next Ellipsis" if the range ends before the last page
                    if ($endPage < $totalPages) {
                        if ($endPage < $totalPages - 1) {
                            echo '<li><span class="px-4 py-2 text-gray-400">...</span></li>';
                        }
                        echo '<li><a href="/dashboard?page=' . $totalPages . '&searchQuery=' . urlencode($searchQuery) . '" class="px-4 py-2 text-indigo-600 hover:text-indigo-900">' . $totalPages . '</a></li>';
                    }
                    ?>

                    <!-- Next Button -->
                    <?php if ($currentPage < $totalPages): ?>
                        <li>
                            <a href="/dashboard?page=<?php echo $currentPage + 1; ?>&searchQuery=<?php echo urlencode($searchQuery); ?>" class="px-4 py-2 text-indigo-600 hover:text-indigo-900 rounded-r-lg">
                                Next
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>

        <!-- pagination end -->

        </div>