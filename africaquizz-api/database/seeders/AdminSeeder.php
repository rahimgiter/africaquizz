<?php
namespace Database\Seeders;
use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        if (!$adminRole) {
            $this->command->error('Rôle admin introuvable. Lance RoleSeeder d\'abord.');
            return;
        }

        AdminUser::updateOrCreate(
            ['email' => 'admin@africaquizz.com'],
            [
                'name' => 'Admin Principal',
                'password' => Hash::make('admin12345'),
                'role_id' => $adminRole->id,
            ]
        );

        // Créer aussi un relecteur et un éditeur pour tester
        $relecteurRole = Role::where('name', 'relecteur')->first();
        AdminUser::updateOrCreate(
            ['email' => 'relecteur@africaquizz.com'],
            ['name' => 'Relecteur Test', 'password' => Hash::make('relecteur123'), 'role_id' => $relecteurRole->id]
        );

        $editeurRole = Role::where('name', 'editeur')->first();
        AdminUser::updateOrCreate(
            ['email' => 'editeur@africaquizz.com'],
            ['name' => 'Éditeur Test', 'password' => Hash::make('editeur123'), 'role_id' => $editeurRole->id]
        );

        $redacteurRole = Role::where('name', 'redacteur')->first();
        AdminUser::updateOrCreate(
            ['email' => 'redacteur@africaquizz.com'],
            ['name' => 'Rédacteur Test', 'password' => Hash::make('redacteur123'), 'role_id' => $redacteurRole->id]
        );

        $this->command->info('AdminSeeder : 4 admins créés (admin, relecteur, editeur, redacteur).');
        $this->command->info('  admin@africaquizz.com / admin12345');
        $this->command->info('  relecteur@africaquizz.com / relecteur123');
        $this->command->info('  editeur@africaquizz.com / editeur123');
        $this->command->info('  redacteur@africaquizz.com / redacteur123');
    }
}