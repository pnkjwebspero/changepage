To highlight some text in the content you provided, you can use a markdown-like syntax by wrapping the text with double asterisks (`**`). Here's the modified content with highlighted text:

# Proton Auth Context Package

This is a Laravel package that provides authentication context functionality using Proton. It allows you to easily integrate Proton login functionality into your Laravel application.

## Installation

1. Run the following command to install the package:

   ```shell
   composer require home-bloks/proton-auth-context
   ```

2. Run the Proton authentication command:

   ```shell
   php artisan proton:auth
   ```

3. Install the required npm packages:

   ```shell
   npm install
   ```

4. Compile the assets:

   ```shell
   npm run dev
   ```

## Configuration

1. Update your `vite.config.js` file by adding the following code:

   ```javascript
   import { defineConfig } from 'vite';
   import laravel from 'laravel-vite-plugin';
   import react from "@vitejs/plugin-react";

   export default defineConfig({
       plugins: [
           laravel({
               input: ['resources/css/app.css', 'resources/js/app.js'],
               refresh: true,
           }),
           react(),
       ],
   });
   ```

2. Update your root JavaScript file (e.g., `App.jsx`, `app.jsx`, `Main.jsx`) with the following code:

   ```jsx
   import ReactDOM from "react-dom/client";
   import ProtonLoginButton from "./components/ProtonLoginButton";
   import { AuthContextProvider } from "./store/auth.context.jsx";

   ReactDOM.createRoot(document.getElementById("root")).render(
     <>
       <AuthContextProvider>
         **<ProtonLoginButton />**
       </AuthContextProvider>
     </>
   );
   ```

3. Customize the code according to your requirements.

4. Add the following code to your header before closing the `</head>` tag:

   ```html
   **@viteReactRefresh**
   **@vite('resources/js/app.jsx')**
   ```

   Note: Make sure the `@vite('resources/js/app.jsx')` file matches the root JavaScript file you updated.

5. Place the following code where you want to add the `ProtonLoginButton` component:

   ```html
   **<div id="root"></div>**
   ```

   You can change the `id` attribute according to your setup in the root JavaScript file.

The highlighted text is denoted by the double asterisks (`**`).
