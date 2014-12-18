<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a great spot to register your various container
		// bindings with the application. As you can see, we are registering our
		// "Registrar" implementation here. You can add your own bindings too!

		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

		$this->app->bind(
			'Laracasts\Commander\CommandTranslator',
			'App\Support\Commands\MyCommandTranslator'
		);

		$this->registerDoctrineRepositories();
	}

	private function registerDoctrineRepositories()
	{
		$repositories = [
			[ 'namespace' => 'App\Accounts', 'entity' => 'User'],
			[ 'namespace' => 'App\Communications', 'entity' => 'Author'],
			[ 'namespace' => 'App\Communications', 'entity' => 'Article'],
			[ 'namespace' => 'App\Communications', 'entity' => 'Draft'],
		];

		foreach($repositories as $item)
		{
			$interface = $item['namespace'] . '\Repositories\\' . $item['entity'] . "Repository";
			$entity = $item['namespace'] . '\\' . $item['entity'];
			$implementation = $item['namespace'] . '\Repositories\\Doctrine' . $item['entity'] . "Repository";

			$this->app->bind($interface, function() use ($entity, $implementation)
			{
				$entityManager = $this->app->make('Doctrine\ORM\EntityManagerInterface');
				return new $implementation($entityManager->getRepository($entity), $entityManager);
			});
		}
	}

}
