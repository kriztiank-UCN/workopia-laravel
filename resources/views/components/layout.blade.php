<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- if there's a title slot, use it; otherwise, use the default title --}}
  <title>{{ $title ?? 'Workopia | Find and list jobs' }}</title>
</head>

<body class="bg-gray-100">
  <x-header />
  <main class="container mx-auto mt-4 p-4">{{ $slot }}</main>
</body>

</html>
