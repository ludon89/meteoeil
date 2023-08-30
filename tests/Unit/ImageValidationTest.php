<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class ImageValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_image_size_validation_rule()
    {
        // Création d'une image de 3 Mo, trop grosse pour la validation
        $bigImage = UploadedFile::fake()->image('big-image.jpg')->size(3000);

        // Création d'un utilisateur, nécessaire pour l'accès à la méthode
        $user = User::factory()->create();

        // Envoi de la requête POST
        $response = $this->actingAs($user)
            ->post(route('observations.store'), [
                'picture' => $bigImage
            ]);

        // Vérif de la présence d'erreurs de validation
        $response->assertSessionHasErrors('picture');
    }
}
