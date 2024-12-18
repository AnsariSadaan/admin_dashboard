<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body class="">
    <nav class="flex justify-between bg-black text-white px-2 py-3">
        <div>
            <img src="" alt="logo">
        </div>
        <div class="flex">
            <h1 class="text-lg px-2"><?php print_r(ucfirst(session()->get('user')->name)) ?></h1>
            <a href="/logout" class="text-white px-4 py-1 rounded-lg bg-red-600 inline-block">Logout</a>
        </div>