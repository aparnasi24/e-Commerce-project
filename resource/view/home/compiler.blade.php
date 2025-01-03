<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Compiler</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom spinner styling */
        .spinner {
            transform: translate(-50%, -50%);
        }
        /* Ensure the textarea grows */
        textarea {
            overflow: hidden;
        }
        /* Loader styles */
        .loader {
            position: relative;
            width: 54px;
            height: 54px;
            border-radius: 10px;
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .loader div {
            width: 8%;
            height: 24%;
            background: rgb(255, 165, 0); /* Orange color */
            position: absolute;
            left: 50%;
            top: 30%;
            opacity: 0;
            border-radius: 50px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            animation: fade458 1s linear infinite;
        }

        @keyframes fade458 {
            from {
                opacity: 1;
            }
            to {
                opacity: 0.25;
            }
        }

        .loader .bar1 { transform: rotate(0deg) translate(0, -130%); animation-delay: 0s; }
        .loader .bar2 { transform: rotate(30deg) translate(0, -130%); animation-delay: -1.1s; }
        .loader .bar3 { transform: rotate(60deg) translate(0, -130%); animation-delay: -1s; }
        .loader .bar4 { transform: rotate(90deg) translate(0, -130%); animation-delay: -0.9s; }
        .loader .bar5 { transform: rotate(120deg) translate(0, -130%); animation-delay: -0.8s; }
        .loader .bar6 { transform: rotate(150deg) translate(0, -130%); animation-delay: -0.7s; }
        .loader .bar7 { transform: rotate(180deg) translate(0, -130%); animation-delay: -0.6s; }
        .loader .bar8 { transform: rotate(210deg) translate(0, -130%); animation-delay: -0.5s; }
        .loader .bar9 { transform: rotate(240deg) translate(0, -130%); animation-delay: -0.4s; }
        .loader .bar10 { transform: rotate(270deg) translate(0, -130%); animation-delay: -0.3s; }
        .loader .bar11 { transform: rotate(300deg) translate(0, -130%); animation-delay: -0.2s; }
        .loader .bar12 { transform: rotate(330deg) translate(0, -130%); animation-delay: -0.1s; }

        /* Textarea and output area styles */
        textarea {
            border: 2px solid rgb(34, 197, 94); /* Green border */
            background-color: rgb(220, 250, 220); /* Light green background */
        }
        
        pre {
            background-color: rgb(240, 240, 255); /* Light blue background */
            border: 1px solid rgb(220, 220, 220); /* Light gray border */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    <nav class="bg-green-500">
        <div class="container mx-auto flex justify-center">
            <a href="/" class="text-white px-4 py-2 hover:bg-green-600">Home</a>
            <a href="/about" class="text-white px-4 py-2 hover:bg-green-600">About</a>
            <a href="/contact" class="text-white px-4 py-2 hover:bg-green-600">Contact</a>
        </div>
    </nav>

    <div class="container mx-auto flex flex-col md:flex-row mt-4 overflow-hidden">
        <div class="input-area flex-1 bg-green-100 p-4 border-b md:border-b-0 md:border-r border-gray-300">
            <textarea id="code" name="code" class="w-full p-2 rounded resize-none h-auto" placeholder="Write your code here..." required>{{ old('code', '') }}</textarea>

            <div class="radio-group mt-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="language" value="java" required class="mr-2"> Java
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="radio" name="language" value="python3" class="mr-2"> Python 3
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="radio" name="language" value="cpp" class="mr-2"> C++
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="radio" name="language" value="javascript" class="mr-2"> JavaScript
                </label>
            </div>

            <button id="run-code" class="mt-4 bg-green-600 text-white py-2 rounded hover:bg-green-700 w-full">Run Code</button>
        </div>

        <div class="output-area flex-1 bg-white p-4 relative overflow-y-auto mt-4 md:mt-0">
            <div class="loader" id="spinner">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
                <div class="bar6"></div>
                <div class="bar7"></div>
                <div class="bar8"></div>
                <div class="bar9"></div>
                <div class="bar10"></div>
                <div class="bar11"></div>
                <div class="bar12"></div>
            </div>
            <h2 class="text-lg font-bold">Output:</h2>
            <pre id="output" class="mt-2 p-2 rounded border overflow-y-auto"></pre>
        </div>
    </div>

    <footer class="bg-green-600 text-white text-center py-4 mt-auto">
        <p>&copy; 2024 mynetwork Compiler. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to auto-resize the textarea
        function autoResizeTextarea(element) {
            element.style.height = 'auto'; // Reset height
            element.style.height = (element.scrollHeight) + 'px'; // Set new height
        }

        $(document).ready(function() {
            // Initialize the textarea height
            autoResizeTextarea(document.getElementById('code'));

            // Add input event listener to textarea
            $('#code').on('input', function() {
                autoResizeTextarea(this);
            });

            $('#run-code').click(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Show spinner
                $('#spinner').show();
                $('#output').text('');

                const code = $('#code').val();
                const language = $('input[name="language"]:checked').val();

                $.ajax({
                    url: '/compile',
                    type: 'POST',
                    data: {
                        code: code,
                        language: language,
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    success: function(response) {
                        // Hide spinner
                        $('#spinner').hide();
                        $('#output').text(response.output);
                    },
                    error: function(xhr) {
                        // Hide spinner and show error
                        $('#spinner').hide();
                        $('#output').text('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
