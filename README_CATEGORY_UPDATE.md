# Category Feature Update Instructions

## Step 1: Add Category Column to Database

1. Open phpMyAdmin (or your database management tool)
2. Select the `shop_db` database
3. Go to the SQL tab
4. Run the following SQL query:

```sql
ALTER TABLE `products` ADD `category` VARCHAR(50) NOT NULL DEFAULT 'other' AFTER `details`;
```

Alternatively, you can run the SQL file `add_category_column.sql` that has been created in the project root.

## Step 2: Update Existing Products (Optional)

If you have existing products and want to assign categories to them, you can run queries like:

```sql
UPDATE `products` SET `category` = 'laptop' WHERE name LIKE '%laptop%';
UPDATE `products` SET `category` = 'smartphone' WHERE name LIKE '%phone%' OR name LIKE '%smartphone%';
UPDATE `products` SET `category` = 'tv' WHERE name LIKE '%tv%' OR name LIKE '%television%';
```

## Step 3: How It Works Now

### Admin Panel:
- When adding a new product, you can now select a category from the dropdown
- When updating a product, you can change its category
- Available categories: Laptop, Television, Camera, Mouse, Fridge, Washing Machine, Smartphone, Watch

### User Side:
- When users click on a category (e.g., "Laptop" from the category slider), they will see ONLY products in that category
- When users click "VIEW COLLECTION" button on homepage, they will see ALL products (goes to shop.php)

## Categories Available:
- laptop
- tv
- camera
- mouse
- fridge
- washing
- smartphone
- watch

## Notes:
- The category field is case-sensitive in the database
- Make sure to select the correct category when adding products
- If a category doesn't match exactly, products won't show up in that category page

