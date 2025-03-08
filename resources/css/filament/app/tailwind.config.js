import preset from "../../../../vendor/filament/filament/tailwind.config.preset";
const colors = require("tailwindcss/colors");

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/awcodes/filament-curator/resources/**/*.blade.php",
        "./vendor/awcodes/mason/resources/**/*.blade.php",
        "./resources/views/mason/**/*.blade.php",
        "./resources/views/components/**/*.blade.php",
        "./resources/views/livewire/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                defaultgray: colors.gray,
            },
        },
    },
};
