<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'John Doe', 'Jane Smith', 'Mike Johnson', 'Sarah Williams', 'David Brown',
            'Emily Davis', 'Robert Miller', 'Lisa Wilson', 'James Moore', 'Mary Taylor',
            'William Anderson', 'Patricia Thomas', 'Richard Jackson', 'Jennifer White', 'Joseph Harris',
            'Linda Martin', 'Thomas Thompson', 'Barbara Garcia', 'Charles Martinez', 'Susan Robinson',
            'Daniel Clark', 'Jessica Rodriguez', 'Matthew Lewis', 'Sarah Lee', 'Anthony Walker',
            'Karen Hall', 'Mark Allen', 'Nancy Young', 'Donald King', 'Betty Wright',
            'Steven Lopez', 'Dorothy Hill', 'Paul Scott', 'Sandra Green', 'Andrew Adams',
            'Ashley Baker', 'Joshua Gonzalez', 'Kimberly Nelson', 'Kevin Carter', 'Michelle Mitchell',
            'Brian Perez', 'Amanda Roberts', 'George Turner', 'Melissa Phillips', 'Edward Campbell',
            'Deborah Parker', 'Ronald Evans', 'Stephanie Edwards', 'Kenneth Collins', 'Rebecca Stewart',
            'Ryan Murphy', 'Laura Cooper', 'Jason Reed', 'Amy Ward', 'Eric Foster',
            'Angela Torres', 'Justin Peterson', 'Brenda Gray', 'Scott Ramirez', 'Emma Watson',
            'Frank Butler', 'Carolyn Simmons', 'Raymond Foster', 'Sharon Powell', 'Gregory Long',
            'Catherine Patterson', 'Jerry Hughes', 'Anna Flores', 'Ralph Washington', 'Marie Butler',
            'Eugene Simmons', 'Janet Foster', 'Wayne Gonzales', 'Diane Bryant', 'Peter Alexander',
            'Frances Russell', 'Johnny Griffin', 'Joyce Diaz', 'Bobby Hayes', 'Ruby Myers',
            'Ralph Ford', 'Lois Hamilton', 'Gerald Graham', 'Norma Sullivan', 'Louis Wallace',
            'Mildred Woods', 'Harold Cole', 'Rose Russell', 'Carl Howard', 'Katherine Ward',
            'Arthur Torres', 'Evelyn Cox', 'Ralph Howard', 'Lillian Richardson', 'Joe Watson',
            'Marie Brooks', 'Willie Sanders', 'Theresa Price', 'Roy Bennett', 'Beverly Wood',
        ];

        $emails = [
            'john.doe@example.com', 'jane.smith@example.com', 'mike.johnson@example.com', 'sarah.williams@example.com',
            'david.brown@example.com', 'emily.davis@example.com', 'robert.miller@example.com', 'lisa.wilson@example.com',
            'james.moore@example.com', 'mary.taylor@example.com', 'william.anderson@example.com', 'patricia.thomas@example.com',
            'richard.jackson@example.com', 'jennifer.white@example.com', 'joseph.harris@example.com', 'linda.martin@example.com',
            'thomas.thompson@example.com', 'barbara.garcia@example.com', 'charles.martinez@example.com', 'susan.robinson@example.com',
            'daniel.clark@example.com', 'jessica.rodriguez@example.com', 'matthew.lewis@example.com', 'sarah.lee@example.com',
            'anthony.walker@example.com', 'karen.hall@example.com', 'mark.allen@example.com', 'nancy.young@example.com',
            'donald.king@example.com', 'betty.wright@example.com', 'steven.lopez@example.com', 'dorothy.hill@example.com',
            'paul.scott@example.com', 'sandra.green@example.com', 'andrew.adams@example.com', 'ashley.baker@example.com',
            'joshua.gonzalez@example.com', 'kimberly.nelson@example.com', 'kevin.carter@example.com', 'michelle.mitchell@example.com',
            'brian.perez@example.com', 'amanda.roberts@example.com', 'george.turner@example.com', 'melissa.phillips@example.com',
            'edward.campbell@example.com', 'deborah.parker@example.com', 'ronald.evans@example.com', 'stephanie.edwards@example.com',
            'kenneth.collins@example.com', 'rebecca.stewart@example.com', 'ryan.murphy@example.com', 'laura.cooper@example.com',
            'jason.reed@example.com', 'amy.ward@example.com', 'eric.foster@example.com', 'angela.torres@example.com',
            'justin.peterson@example.com', 'brenda.gray@example.com', 'scott.ramirez@example.com', 'emma.watson@example.com',
            'frank.butler@example.com', 'carolyn.simmons@example.com', 'raymond.foster@example.com', 'sharon.powell@example.com',
            'gregory.long@example.com', 'catherine.patterson@example.com', 'jerry.hughes@example.com', 'anna.flores@example.com',
            'ralph.washington@example.com', 'marie.butler@example.com', 'eugene.simmons@example.com', 'janet.foster@example.com',
            'wayne.gonzales@example.com', 'diane.bryant@example.com', 'peter.alexander@example.com', 'frances.russell@example.com',
            'johnny.griffin@example.com', 'joyce.diaz@example.com', 'bobby.hayes@example.com', 'ruby.myers@example.com',
            'ralph.ford@example.com', 'lois.hamilton@example.com', 'gerald.graham@example.com', 'norma.sullivan@example.com',
            'louis.wallace@example.com', 'mildred.woods@example.com', 'harold.cole@example.com', 'rose.russell@example.com',
            'carl.howard@example.com', 'katherine.ward@example.com', 'arthur.torres@example.com', 'evelyn.cox@example.com',
            'ralph.howard@example.com', 'lillian.richardson@example.com', 'joe.watson@example.com', 'marie.brooks@example.com',
            'willie.sanders@example.com', 'theresa.price@example.com', 'roy.bennett@example.com', 'beverly.wood@example.com',
        ];

        $phones = [
            '9876543210', '9876543211', '9876543212', '9876543213', '9876543214',
            '9876543215', '9876543216', '9876543217', '9876543218', '9876543219',
            '9876543220', '9876543221', '9876543222', '9876543223', '9876543224',
            '9876543225', '9876543226', '9876543227', '9876543228', '9876543229',
            '9876543230', '9876543231', '9876543232', '9876543233', '9876543234',
            '9876543235', '9876543236', '9876543237', '9876543238', '9876543239',
            '9876543240', '9876543241', '9876543242', '9876543243', '9876543244',
            '9876543245', '9876543246', '9876543247', '9876543248', '9876543249',
            '9876543250', '9876543251', '9876543252', '9876543253', '9876543254',
            '9876543255', '9876543256', '9876543257', '9876543258', '9876543259',
            '9876543260', '9876543261', '9876543262', '9876543263', '9876543264',
            '9876543265', '9876543266', '9876543267', '9876543268', '9876543269',
            '9876543270', '9876543271', '9876543272', '9876543273', '9876543274',
            '9876543275', '9876543276', '9876543277', '9876543278', '9876543279',
            '9876543280', '9876543281', '9876543282', '9876543283', '9876543284',
            '9876543285', '9876543286', '9876543287', '9876543288', '9876543289',
            '9876543290', '9876543291', '9876543292', '9876543293', '9876543294',
            '9876543295', '9876543296', '9876543297', '9876543298', '9876543299',
            '9876543300', '9876543301', '9876543302', '9876543303', '9876543304',
            '9876543305', '9876543306', '9876543307', '9876543308', '9876543309',
            '9876543310', '9876543311', '9876543312', '9876543313', '9876543314',
            '9876543315', '9876543316', '9876543317', '9876543318', '9876543319',
            '9876543320', '9876543321', '9876543322', '9876543323', '9876543324',
            '9876543325', '9876543326', '9876543327', '9876543328', '9876543329',
        ];

        $countryCodes = ['+91', '+1', '+44', '+61', '+971'];
        $roomTypes = ['deluxe', 'suite', 'executive', 'presidential'];
        $comments = [
            'Looking forward to my stay!',
            'Please confirm availability.',
            'Need early check-in if possible.',
            'Special occasion - anniversary celebration.',
            'Business trip - need quiet room.',
            'Family vacation with kids.',
            'Honeymoon suite preferred.',
            'Accessible room required.',
            'Late checkout requested.',
            'Vegetarian meal preferences.',
            null, null, null, null, null,
        ];

        $baseDate = Carbon::now()->subDays(90);
        
        for ($i = 0; $i < 100; $i++) {
            $checkinDate = $baseDate->copy()->addDays($i);
            $checkoutDate = $checkinDate->copy()->addDays(rand(1, 5));
            
            Contact::create([
                'name' => $names[$i % count($names)],
                'email' => $emails[$i % count($emails)],
                'country_code' => $countryCodes[array_rand($countryCodes)],
                'phone' => $phones[$i % count($phones)],
                'room_type' => $roomTypes[array_rand($roomTypes)],
                'checkin_date' => $checkinDate,
                'checkout_date' => $checkoutDate,
                'comments' => $comments[array_rand($comments)],
                'created_at' => $baseDate->copy()->addDays($i),
                'updated_at' => $baseDate->copy()->addDays($i),
            ]);
        }
    }
}
