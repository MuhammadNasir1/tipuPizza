module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#EC1223",
                content: "#F5F5F5",
  
            
            },
          
        },
      
    },
    plugins: [require("flowbite/plugin")],
};
