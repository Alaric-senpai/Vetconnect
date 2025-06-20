
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register a new Pet - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 p-6">

<?php require_once __DIR__ . '/../shared/header.php'; ?>

<h1 class="text-center font-bold text-4xl my-3">
    Add a new Pet
</h1>
<p class="text-center leading-loose text-gray-600 italic">
    Register your pet to be able to book appointments.
</p>

<div class="bg-white mt-5 p-3 border border-blue-400 group rounded-md shadow-md hover:border-emerald-500 transition-all hover:shadow-lg duration-300 ease-linear">
    <form action="?page=save_pet" method="post">
        <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-4">
            <div class="flex flex-col">
                <div class="flex flex-col justify-center p-4 gap-4">
                    <label for="name" class="text-gray-600 font-semibold tracking-wide italic">Enter pet name</label>
                    <input type="text" name="name" id="name" class="h-10 border border-black p-4 placeholder-shown:text-emerald-800 outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg text-black" placeholder="Enter your pet's name" />
                </div>
                <div class="flex flex-col justify-center p-4 gap-4">
                    <label for="gender" class="text-gray-600 font-semibold tracking-wide italic">Gender</label>
                    <input type="text" name="gender" id="gender" class="h-10 border border-black p-4 placeholder-shown:text-emerald-800 outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg text-black" placeholder="Enter your pet's gender" />
                </div>
                <div class="flex flex-col justify-center p-4 gap-4">
                    <label for="breed" class="text-gray-600 font-semibold tracking-wide italic">Breed</label>
                    <input type="text" name="breed" id="breed" class="h-10 border border-black p-4 placeholder-shown:text-emerald-800 outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg text-black" placeholder="Enter your pet's breed" />
                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-col justify-center p-4 gap-4">
                    <label for="age" class="text-gray-600 font-semibold tracking-wide italic">Pet Age</label>
                    <input type="number" name="age" id="age" class="h-10 border border-black p-4 placeholder-shown:text-emerald-800 outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg text-black" placeholder="Enter your pet's age" />
                </div>
                <div class="flex flex-col justify-center p-4 gap-4">
                    <label for="species" class="text-gray-600 font-semibold tracking-wide italic">Species</label>
                    <input type="text" name="species" id="species" class="h-10 border border-black p-4 placeholder-shown:text-emerald-800 outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg text-black" placeholder="Enter your pet's species" />
                </div>
            </div>
        </div>
        <button type="submit" class="w-full h-10 flex items-center justify-center bg-emerald-400 hover:bg-teal-400 duration-300 ease-linear transition-all shadow-md hover:scale-95 hover:shadow-lg text-white rounded-md">
            Register Pet
        </button>
    </form>
</div>

</body>
</html>
