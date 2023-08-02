
<?php
use Illuminate\Support\Facades\Schema;

if (Schema::hasColumn('products', 'user_id')) {
    // The user_id column exists in the products table
    // Your code logic here
} else {
    // The user_id column does not exist in the products table
    // Your code logic here
}
