validate:
	composer validate

install:
	@echo "📦 Installing dependencies..."
	composer install

	@echo "⚙️ Setting up environment..."
	@if [ ! -f .env ]; then \
		echo "🔧 Creating .env from .env.example..."; \
		cp .env.example .env; \
	fi

	@echo "🔑 Generating APP_KEY..."
	@php artisan key:generate

	npm install
	npm run build

	@echo "🗄️ Running migrations..."
	@php artisan migrate --force

	@echo "🔐 Fixing permissions..."
	@chmod -R 775 storage bootstrap/cache

	@echo "✅ Installation complete!"

start:
	@echo "🚀 Starting Laravel server at http://localhost:8000"
	@php artisan serve
