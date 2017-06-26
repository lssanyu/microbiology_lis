<?php

class MicrobiologyProductionSeeder extends DatabaseSeeder
{
    public function run()
    {
        /* DISTRICT table */
        $districtsData = array(
            array("id" => \Config::get('constants.DISTRICT_ID'), 
                'name' => \Config::get('constants.DISTRICT_NAME')
                ),
        );

        foreach ($districtsData as $district)
        {
            $districts[] = District::create($district);
        }
        $this->command->info('Kampala seeded');

        District::create(['name' => 'Buikwe']);
        District::create(['name' => 'Bukomansimbi']);
        District::create(['name' => 'Butambala']);
        District::create(['name' => 'Buvuma']);
        District::create(['name' => 'Gomba']);
        District::create(['name' => 'Kalangala']);
        District::create(['name' => 'Kalungu']);
        District::create(['name' => 'Kayunga']);
        District::create(['name' => 'Kiboga']);
        District::create(['name' => 'Kyankwanzi']);
        District::create(['name' => 'Luweero']);
        District::create(['name' => 'Lwengo']);
        District::create(['name' => 'Lyantonde']);
        District::create(['name' => 'Masaka']);
        District::create(['name' => 'Mityana']);
        District::create(['name' => 'Mpigi']);
        District::create(['name' => 'Mubende']);
        District::create(['name' => 'Mukono']);
        District::create(['name' => 'Nakaseke']);
        District::create(['name' => 'Nakasongola']);
        District::create(['name' => 'Rakai']);
        District::create(['name' => 'Ssembabule']);
        District::create(['name' => 'Wakiso']);
        District::create(['name' => 'Amuria']);
        District::create(['name' => 'Budaka']);
        District::create(['name' => 'Bududa']);
        District::create(['name' => 'Bugiri']);
        District::create(['name' => 'Bukedea']);
        District::create(['name' => 'Bukwa']);
        District::create(['name' => 'Bulambuli']);
        District::create(['name' => 'Busia']);
        District::create(['name' => 'Butaleja']);
        District::create(['name' => 'Buyende']);
        District::create(['name' => 'Iganga']);
        District::create(['name' => 'Jinja']);
        District::create(['name' => 'Kaberamaido']);
        District::create(['name' => 'Kaliro']);
        District::create(['name' => 'Kamuli']);
        District::create(['name' => 'Kapchorwa']);
        District::create(['name' => 'Katakwi']);
        District::create(['name' => 'Kibuku']);
        District::create(['name' => 'Kumi']);
        District::create(['name' => 'Kween']);
        District::create(['name' => 'Luuka']);
        District::create(['name' => 'Manafwa']);
        District::create(['name' => 'Mayuge']);
        District::create(['name' => 'Mbale']);
        District::create(['name' => 'Namayingo']);
        District::create(['name' => 'Namutumba']);
        District::create(['name' => 'Ngora']);
        District::create(['name' => 'Pallisa']);
        District::create(['name' => 'Serere']);
        District::create(['name' => 'Sironko']);
        District::create(['name' => 'Soroti']);
        District::create(['name' => 'Tororo']);
        District::create(['name' => 'Abim']);
        District::create(['name' => 'Adjumani']);
        District::create(['name' => 'Agago']);
        District::create(['name' => 'Alebtong']);
        District::create(['name' => 'Amolatar']);
        District::create(['name' => 'Amudat']);
        District::create(['name' => 'Amuru']);
        District::create(['name' => 'Apac']);
        District::create(['name' => 'Arua']);
        District::create(['name' => 'Dokolo']);
        District::create(['name' => 'Gulu']);
        District::create(['name' => 'Kaabong']);
        District::create(['name' => 'Kitgum']);
        District::create(['name' => 'Koboko']);
        District::create(['name' => 'Kole']);
        District::create(['name' => 'Kotido']);
        District::create(['name' => 'Lamwo']);
        District::create(['name' => 'Lira']);
        District::create(['name' => 'Maracha']);
        District::create(['name' => 'Moroto']);
        District::create(['name' => 'Moyo']);
        District::create(['name' => 'Nakapiripirit']);
        District::create(['name' => 'Napak']);
        District::create(['name' => 'Nebbi']);
        District::create(['name' => 'Nwoya']);
        District::create(['name' => 'Otuke']);
        District::create(['name' => 'Oyam']);
        District::create(['name' => 'Pader']);
        District::create(['name' => 'Yumbe']);
        District::create(['name' => 'Zombo']);
        District::create(['name' => 'Buhweju']);
        District::create(['name' => 'Buliisa']);
        District::create(['name' => 'Bundibugyo']);
        District::create(['name' => 'Bushenyi']);
        District::create(['name' => 'Hoima']);
        District::create(['name' => 'Ibanda']);
        District::create(['name' => 'Isingiro']);
        District::create(['name' => 'Kabale']);
        District::create(['name' => 'Kabarole']);
        District::create(['name' => 'Kamwenge']);
        District::create(['name' => 'Kanungu']);
        District::create(['name' => 'Kasese']);
        District::create(['name' => 'Kibaale']);
        District::create(['name' => 'Kiruhura']);
        District::create(['name' => 'Kiryandongo']);
        District::create(['name' => 'Kisoro']);
        District::create(['name' => 'Kyegegwa']);
        District::create(['name' => 'Kyenjojo']);
        District::create(['name' => 'Masindi']);
        District::create(['name' => 'Mbarara']);
        District::create(['name' => 'Mitooma']);
        District::create(['name' => 'Ntoroko']);
        District::create(['name' => 'Ntungamo']);
        District::create(['name' => 'Rubirizi']);
        District::create(['name' => 'Rukungiri']);
        District::create(['name' => 'Sheema']);
        District::create(['name' => 'Omoro']);
        District::create(['name' => 'Kagadi']);
        District::create(['name' => 'Kakumiro']);
        District::create(['name' => 'Rubanda']);
        District::create(['name' => 'Bukwo']);
        $this->command->info('Other Districts seeded');

        /* Facility Ownership table */
        $facilityownershipsData = array(
            array("name" => "Public"),
            array("name" => "PFP"),
            array("name" => "PNFP"),
            array("name" => "Other"),
        );

        foreach ($facilityownershipsData as $facilityownership)
        {
            $facilityownerships[] = UNHLSFacilityOwnership::create($facilityownership);
        }
        $this->command->info('Facility Ownerships seeded');

        
        /* Facility Levels table */
        $facilitylevelsData = array(
            array("name" => "Public NRH"),//1
            array("name" => "Public RRH"),//2
            array("name" => "Public GH"),//3
            array("name" => "Public HCIV"),//4
            array("name" => "Public HCIII"),//5
            array("name" => "Public HCII"),//6
            array("name" => "Public HCI"),//7
            array("name" => "Private Level 3"),//8
            array("name" => "Private Level 2"),//9
            array("name" => "Private Level 1"),//10
            array("name" => "Special Clinic"),//11
            array("name" => "Clinic"),//12
        );

        foreach ($facilitylevelsData as $facilitylevel)
        {
            $facilitylevels[] = UNHLSFacilityLevel::create($facilitylevel);
        }
        $this->command->info('Facility Levels seeded');


        /* Facility table */
        $facilitysData = array(
            array("id" => \Config::get('constants.FACILITY_ID'),
                'name' => \Config::get('constants.FACILITY_NAME'),
                'district_id' => \Config::get('constants.DISTRICT_ID'),
                'code' => \Config::get('constants.FACILITY_CODE'),
                'level_id' => \Config::get('constants.FACILITY_LEVEL_ID'),
                'ownership_id' => \Config::get('constants.FACILITY_OWNERSHIP_ID')
                ),
        );

        foreach ($facilitysData as $facility)
        {
            $facilitys[] = UNHLSFacility::create($facility);
        }
        $this->command->info('Facility seeded');


        /* Users table */
        $usersData = array(
            array(
                "username" => "administrator", "password" => Hash::make("password"), 
                "email" => "", "name" => "A-LIS Admin", "designation" => "Programmer", 
                "facility_id" => \Config::get('constants.FACILITY_ID')
            ),
        );

        foreach ($usersData as $user)
        {
            $users[] = User::create($user);
        }
        $this->command->info('users seeded');



        /* BB Actions table */
        $bbactionsData = array(
            array("actionname" => "Reported to administration for further action"),
			array("actionname" => "Referred to mental department"),
			array("actionname" => "Gave first aid (e.g. arrested bleeding)"),
			array("actionname" => "Referred to clinician for further management"),
            array("actionname" => "Conducted risk assessment"),
            array("actionname" => "Intervened to interrupt/arrest progress of incident (e.g. Used neutralizing agent, stopping a fight)"),
            array("actionname" => "Disposed off broken container to designated waste bin/sharps"),
            array("actionname" => "Patient sample taken & referred to testing lab Isolated suspected patient"),
            array("actionname" => "Reported to or engaged national level BRM for intervention"),
            array("actionname" => "Victim counseled"),
            array("actionname" => "Contacted Police"),
            array("actionname" => "Used spill kit"),
            array("actionname" => "Administered PEP"),
            array("actionname" => "Referred to disciplinary committee"),
            array("actionname" => "Contained the spillage"),
            array("actionname" => "Disinfected the place"),
            array("actionname" => "Switched off the Electricity Mains"),
            array("actionname" => "Washed punctured area"),
            array("actionname" => "Others"),
        );

        foreach ($bbactionsData as $bbaction)
        {
            $bbactions[] = BbincidenceAction::create($bbaction);
        }
        $this->command->info('BB Actions seeded');
		
		
		/* BB Causes table */
        $bbcausesData = array(
			array("causename" => "Defective Equipment"),
			array("causename" => "Hazardous Chemicals"),
			array("causename" => "Unsafe Procedure"),
			array("causename" => "Psychological causes (e.g. emotional condition, depression, mental confusion)"),
            array("causename" => "Unsafe storage of laboratory chemicals"),
            array("causename" => "Lack of Skill or Knowledge"),
            array("causename" => "Lack of Personal Protective Equipment"),
            array("causename" => "Unsafe Working Environment"),
            array("causename" => "Lack of Adequate Physical Security"),
            array("causename" => "Unsafe location of laboratory equipment"),
            array("causename" => "Other"),
        );

        foreach ($bbcausesData as $bbcause)
        {
            $bbcauses[] = BbincidenceCause::create($bbcause);
        }
        $this->command->info('BB Causes seeded');
		
		/* BB Natures table */
        $bbnaturesData = array(
            array("name"=>"Assault/Fight among staff","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Fainting","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Roof leakages","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Machine cuts/bruises","class"=>"Mechanical","priority"=>"Minor"),
            array("name"=>"Electric shock/burn","class"=>"Mechanical","priority"=>"Major"),
            array("name"=>"Death within lab","class"=>"Ergonometric and Medical","priority"=>"Major"),
            array("name"=>"Slip or fall","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Unnecessary destruction of lab material","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Theft of laboratory consumables","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Breakage of sample container","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Prick/cut by unused sharps","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Injury caused by laboratory objects","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Chemical burn","class"=>"Chemical","priority"=>"Minor"),
            array("name"=>"Theft of chemical","class"=>"Chemical","priority"=>"Minor"),
            array("name"=>"Chemical spillage","class"=>"Chemical","priority"=>"Major"),
            array("name"=>"Theft of equipment","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Attack on the Lab","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Collapsing building","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Bike rider accident","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Fire","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Needle prick or cuts by used sharps","class"=>"Biological","priority"=>"Minor"),
            array("name"=>"Sample spillage","class"=>"Biological","priority"=>"Minor"),
            array("name"=>"Theft of samples","class"=>"Biological","priority"=>"Major"),
            array("name"=>"Contact with VHF suspect","class"=>"Biological","priority"=>"Major"),
            array("name"=>"Contact with radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Theft of radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Poor disposal of radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Poor vision from inadequate light","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Back pain from posture effects","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Other occupational hazard","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Other","class"=>"Other","priority"=>"Other"),
        );

        foreach ($bbnaturesData as $bbnature)
        {
            $bbnatures[] = BbincidenceNature::create($bbnature);
        }
        $this->command->info('BB Natures seeded');
        
        
        
        /* Measure Types */
        $measureTypes = array(
            array("id" => "1", "name" => "Numeric Range"),
            array("id" => "2", "name" => "Alphanumeric Values"),
            array("id" => "3", "name" => "Autocomplete"),
            array("id" => "4", "name" => "Free Text")
        );

        foreach ($measureTypes as $measureType)
        {
            MeasureType::create($measureType);
        }
        $this->command->info('measure_types seeded');
                

        /* Test Phase table */
        $test_phases = array(
          array("id" => "1", "name" => "Pre-Analytical"),
          array("id" => "2", "name" => "Analytical"),
          array("id" => "3", "name" => "Post-Analytical")
        );
        foreach ($test_phases as $test_phase)
        {
            TestPhase::create($test_phase);
        }
        $this->command->info('test_phases seeded');

        /* Test Status table */
        $test_statuses = array(
          array("id" => "1","name" => "not-received","test_phase_id" => "1"),//Pre-Analytical
          array("id" => "2","name" => "pending","test_phase_id" => "1"),//Pre-Analytical
          array("id" => "3","name" => "started","test_phase_id" => "2"),//Analytical
          array("id" => "4","name" => "completed","test_phase_id" => "3"),//Post-Analytical
          array("id" => "5","name" => "verified","test_phase_id" => "3"),//Post-Analytical
          array("id" => "6","name" => "rejected-preanalysis","test_phase_id" => "1"),//Pre-Analytical
          array("id" => "7","name" => "rejected-atanalysis","test_phase_id" => "2"),//Analytical
        );
        foreach ($test_statuses as $test_status)
        {
            TestStatus::create($test_status);
        }
        $this->command->info('test_statuses seeded');

        /* Specimen Status table */
        $specimen_statuses = array(
          array("id" => "1", "name" => "specimen-accepted"),
          array("id" => "2", "name" => "specimen-rejected"),
          array("id" => "3", "name" => "referred-out")
        );
        foreach ($specimen_statuses as $specimen_status)
        {
            SpecimenStatus::create($specimen_status);
        }
        $this->command->info('specimen_statuses seeded');

        /* Rejection Reasons table */
        $rejection_reasons_array = array(
          array("reason" => "Poorly labelled"),
          array("reason" => "Over saturation"),
          array("reason" => "Insufficient Sample"),
          array("reason" => "Scattered"),
          array("reason" => "Clotted Blood"),
          array("reason" => "Two layered spots"),
          array("reason" => "Serum rings"),
          array("reason" => "Scratched"),
          array("reason" => "Haemolysis"),
          array("reason" => "Spots that cannot elute"),
          array("reason" => "Leaking"),
          array("reason" => "Broken Sample Container"),
          array("reason" => "Mismatched sample and form labelling"),
          array("reason" => "Missing Labels on container and tracking form"),
          array("reason" => "Empty Container"),
          array("reason" => "Samples without tracking forms"),
          array("reason" => "Poor transport"),
          array("reason" => "Lipaemic"),
          array("reason" => "Wrong container/Anticoagulant"),
          array("reason" => "Request form without samples"),
          array("reason" => "Missing collection date on specimen / request form."),
          array("reason" => "Name and signature of requester missing"),
          array("reason" => "Mismatched information on request form and specimen container."),
          array("reason" => "Request form contaminated with specimen"),
          array("reason" => "Duplicate specimen received"),
          array("reason" => "Delay between specimen collection and arrival in the laboratory"),
          array("reason" => "Inappropriate specimen packing"),
          array("reason" => "Inappropriate specimen for the test"),
          array("reason" => "Inappropriate test for the clinical condition"),
          array("reason" => "No Label"),
          array("reason" => "Leaking"),
          array("reason" => "No Sample in the Container"),
          array("reason" => "No Request Form"),
          array("reason" => "Missing Information Required"),
        );
        foreach ($rejection_reasons_array as $rejection_reason)
        {
            $rejection_reasons[] = RejectionReason::create($rejection_reason);
        }
        $this->command->info('rejection_reasons seeded');

        /* Specimen table */
       
        $this->command->info('specimens seeded');
        $now = new DateTime();

        /* Permissions table */
        $permissions = array(
            array("name" => "view_names", "display_name" => "Can view patient names"),
            array("name" => "manage_patients", "display_name" => "Can add patients"),

            array("name" => "receive_external_test", "display_name" => "Can receive test requests"),
            array("name" => "request_test", "display_name" => "Can request new test"),
            array("name" => "accept_test_specimen", "display_name" => "Can accept test specimen"),
            array("name" => "reject_test_specimen", "display_name" => "Can reject test specimen"),
            array("name" => "change_test_specimen", "display_name" => "Can change test specimen"),
            array("name" => "start_test", "display_name" => "Can start tests"),
            array("name" => "enter_test_results", "display_name" => "Can enter tests results"),
            array("name" => "edit_test_results", "display_name" => "Can edit test results"),
            array("name" => "verify_test_results", "display_name" => "Can verify test results"),
            array("name" => "send_results_to_external_system", "display_name" => "Can send test results to external systems"),
            array("name" => "refer_specimens", "display_name" => "Can refer specimens"),

            array("name" => "manage_users", "display_name" => "Can manage users"),
            array("name" => "manage_test_catalog", "display_name" => "Can manage test catalog"),
            array("name" => "manage_lab_configurations", "display_name" => "Can manage lab configurations"),
            array("name" => "view_reports", "display_name" => "Can view reports"),
            array("name" => "manage_inventory", "display_name" => "Can manage inventory"),
            array("name" => "request_topup", "display_name" => "Can request top-up"),
            array("name" => "manage_qc", "display_name" => "Can manage Quality Control")
        );

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        $this->command->info('Permissions table seeded');

        /* Roles table */
        $roles = array(
            array("name" => "Superadmin"),
            array("name" => "Technologist"),
            array("name" => "Receptionist")
        );
        foreach ($roles as $role) {
            Role::create($role);
        }
        $this->command->info('Roles table seeded');

        $user1 = User::find(1);
        $role1 = Role::find(1);
        $permissions = Permission::all();

        //Assign all permissions to role administrator
        foreach ($permissions as $permission) {
            $role1->attachPermission($permission);
        }
        //Assign role Administrator to user 1 administrator
        $user1->attachRole($role1);
    }
}
