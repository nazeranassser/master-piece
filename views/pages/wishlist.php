<!DOCTYPE html>
<html>
<head>
  <title>Wishlist</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 font-sans">
  <div class="max-w-3xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">My Wishlist</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <form>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="item">
            Item
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="item" type="text" placeholder="Enter item name">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="link">
            Link
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="link" type="url" placeholder="Enter item link">
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            Add to Wishlist
          </button>
        </div>
      </form>
    </div>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <h2 class="text-xl font-bold mb-4">Wishlist Items</h2>
      <ul class="list-disc pl-6">
        <li class="mb-2">
          <a href="#" class="text-blue-500 hover:underline">Product 1</a>
        </li>
        <li class="mb-2">
          <a href="#" class="text-blue-500 hover:underline">Product 2</a>
        </li>
        <li class="mb-2">
          <a href="#" class="text-blue-500 hover:underline">Product 3</a>
        </li>
      </ul>
    </div>
  </div>
</body>
</html>