module.exports = {
    content: [
        './*.html',
        './inc/**/*.html',
        './**/*.html',
        './**/**/*.html',
        './*.php',
        './inc/**/*.php',
        './**/*.php',
        './**/**/*.php',
        './safelist.txt'
    ],
    safelist: [
        'text-center'
    ],
    theme: {
        extend: {
            colors: {
                "primary": "#FF0003",
                "secondary": "#000000",
                "highlight": "#FFF000",
            },
            aspectRatio: {
                "16/9": "16/9",
                "4/3": "4/3",
            }
        }
    },
    plugins: []
}