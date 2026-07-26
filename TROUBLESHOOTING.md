# Troubleshooting Guide - Modern UI Upgrade

## If you don't see the changes:

### 1. **Clear Browser Cache**
   - Press `Ctrl + F5` (Windows) or `Cmd + Shift + R` (Mac) for hard refresh
   - Or clear browser cache manually

### 2. **Check Browser Console**
   - Press `F12` to open Developer Tools
   - Go to "Console" tab
   - Look for any red error messages
   - If you see "GSAP library not loaded", check your internet connection

### 3. **Verify Files Are Updated**
   - Check that `css/style.css` has modern styles (look for gradients, transitions)
   - Check that `js/script.js` includes GSAP animations
   - Check that `components/footer.php` includes GSAP library

### 4. **Check Network Tab**
   - In Developer Tools, go to "Network" tab
   - Refresh the page
   - Look for:
     - `style.css` - should load successfully (status 200)
     - `gsap.min.js` - should load successfully
     - `script.js` - should load successfully

### 5. **Test Theme Toggle**
   - Look for moon/sun icon in the header (top right)
   - Click it to toggle dark/light mode
   - If it doesn't work, check console for JavaScript errors

### 6. **Verify Server is Running**
   - Make sure XAMPP Apache is running
   - Access via `http://localhost/projectdone/` not `file://`

## Expected Visual Changes:

✅ Modern gradient buttons (purple/indigo)
✅ Smooth hover effects on cards
✅ Better shadows and rounded corners
✅ Improved typography (Inter/Poppins fonts)
✅ Animated page transitions
✅ Dark mode toggle (moon/sun icon)
✅ Better spacing and layout

## If Still Not Working:

1. Check PHP error logs in XAMPP
2. Verify all file paths are correct
3. Try accessing a different page (shop.php, cart.php)
4. Check if JavaScript is enabled in browser

