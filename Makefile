install:
	composer install
lint:
	composer run-script phpcs src bin
lint-fix:
	composer run-script phpcbf