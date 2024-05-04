<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Livewire Poll</title>

        <script src="https://cdn.tailwindcss.com"></script> {{-- tailwindcss --}}

        {{-- blade-formatter-disable --}}
        <style type="text/tailwindcss">
            .btn {
                @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
            }

            label {
                @apply block uppercase text-slate-700 mb-2 
            }

            input, 
            textarea {
                /* @Apply is a tailwind directive to group some of predefined classes together and naming that ground with single class name */
                @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-lg
            }

            .error {
                @apply text-red-500 text-sm
            }
        </style>
    {{-- blade-formatter-enable --}}

        @livewireStyles {{-- Renders the styles needed for Livewire components. --}}
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    @livewireScripts
    <livewire:view-polls />
</body>
</html>