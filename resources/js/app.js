/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

function purchaseFruit(fruit, stock) {
    let msg = '';
    if ($product["stock"] > 0) {
        msg = 'You have just bought a curious ' + $product["name"];
    } else {
        msg = 'Sorry, we have sold out of curious ' + $product["name"] + '\'s';
    }
    alert(msg);
}
