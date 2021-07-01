# Coccoc_Test
# Step 1:
composer install
composer update --dev
composer update
# Step 2:
composer dump-autoload
# Step 3:
php -S 127.0.0.1:8000

Someday, we need add fee by product type,
then we create a new Class ShippingFeeV2 implements ShippingFeeInterface
=> ShippingFee without change code.

# run unit test
vendor/bin/phpunit