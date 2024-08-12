<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\VacationPlan;


class TesteGeral extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_create_a_vacation_plan()
    {
        $user = User::factory()->create();

        $data = [
            'title' => 'Férias de Verão',
            'description' => 'Viagem para a praia',
            'date' => '2024-12-01',
            'location' => 'Bahia',
            'participants' => 'John Doe, Jane Doe',
        ];

        $response = $this->actingAs($user)->post('/api/vacation-plans', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('vacation_plans', $data);
    }

    public function test_a_user_can_view_a_vacation_plan()
    {
        $user = User::factory()->create();
        $vacationPlan = VacationPlan::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('/api/vacation-plans/' . $vacationPlan->id);

        $response->assertStatus(200);
        $response->assertJson($vacationPlan->toArray());
    }

    public function test_a_user_can_update_a_vacation_plan()
    {
        $user = User::factory()->create();
        $vacationPlan = VacationPlan::factory()->create(['user_id' => $user->id]);

        $data = [
            'title' => 'Férias de Inverno',
            'description' => 'Viagem para as montanhas',
            'date' => '2024-12-20',
            'location' => 'Serra Gaúcha',
            'participants' => 'John Doe, Jane Doe',
        ];

        $response = $this->actingAs($user)->put('/api/vacation-plans/' . $vacationPlan->id, $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('vacation_plans', $data);
    }

    public function test_a_user_can_delete_a_vacation_plan()
    {
        $user = User::factory()->create();
        $vacationPlan = VacationPlan::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete('/api/vacation-plans/' . $vacationPlan->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('vacation_plans', ['id' => $vacationPlan->id]);
    }
}
