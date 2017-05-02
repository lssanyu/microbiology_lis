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
        $this->command->info('Districts seeded');


        /* Facility Ownership table */
        $facilityownershipsData = array(
            array("owner" => "Public"),
            array("owner" => "PFP"),
            array("owner" => "PNFP"),
            array("owner" => "Other"),
            
        );

        foreach ($facilityownershipsData as $facilityownership)
        {
            $facilityownerships[] = UNHLSFacilityOwnership::create($facilityownership);
        }
        $this->command->info('Facility Ownerships seeded');

        
        /* Facility Levels table */
        $facilitylevelsData = array(
            array("level" => "Public NRH"),
            array("level" => "Public RRH"),
            array("level" => "Public GH"),
            array("level" => "Public HCIV"),
            array("level" => "Public HCIII"),
            array("level" => "Private Level 3"),
            array("level" => "Private Level 2"),
            array("level" => "Private Level 1"),
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
        

       
        /* Specimen Types table */
        $specTypesData = array(
            array("name" => "Ascitic Tap"),
            array("name" => "Aspirate"),
            array("name" => "CSF"),
            array("name" => "Dried Blood Spot"),
            array("name" => "High Vaginal Swab"),
            array("name" => "Nasal Swab"),
            array("name" => "Plasma"),
            array("name" => "Plasma EDTA"),
            array("name" => "Pleural Tap"),
            array("name" => "Pus Swab"),
            array("name" => "Rectal Swab"),
            array("name" => "Semen"),
            array("name" => "Serum"),
            array("name" => "Skin"),
            array("name" => "Vomitus"),
            array("name" => "Stool"),
            array("name" => "Synovial Fluid"),
            array("name" => "Throat Swab"),
            array("name" => "Urethral Smear"),
            array("name" => "Urine"),
            array("name" => "Vaginal Smear"),
            array("name" => "Water"),
            array("name" => "Whole Blood"),
        );

        foreach ($specTypesData as $specimenType)
        {
            $specTypes[] = SpecimenType::create($specimenType);
        }
        $this->command->info('specimen_types seeded');
        
        /* Test Categories table - These map on to the lab sections */
        $lab_section_microbiology = TestCategory::create(array("name" => "MICROBIOLOGY","description" => ""));

        $this->command->info('test_categories seeded');
        
        
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
                
        /* Measures table */
        $measureBSforMPS = Measure::create(
            array("measure_type_id" => "2",
                "name" => "BS for mps", 
                "unit" => ""));
        $measure1 = Measure::create(array("measure_type_id" => "2", "name" => "Grams stain", "unit" => ""));
        $measure2 = Measure::create(array("measure_type_id" => "2", "name" => "SERUM AMYLASE", "unit" => ""));
        $measure3 = Measure::create(array("measure_type_id" => "2", "name" => "calcium", "unit" => ""));
        $measure4 = Measure::create(array("measure_type_id" => "2", "name" => "SGOT", "unit" => ""));
        $measure5 = Measure::create(array("measure_type_id" => "2", "name" => "Indirect COOMBS test", "unit" => ""));
        $measure6 = Measure::create(array("measure_type_id" => "2", "name" => "Direct COOMBS test", "unit" => ""));
        $measure7 = Measure::create(array("measure_type_id" => "2", "name" => "Du test", "unit" => ""));
        
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "No mps seen", "interpretation" => "Negative"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "+", "interpretation" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "++", "interpretation" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "+++", "interpretation" => "Positive"));
        
        MeasureRange::create(array("measure_id" => $measure1->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure1->id, "alphanumeric" => "Positive"));

        MeasureRange::create(array("measure_id" => $measure2->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measure2->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measure2->id, "alphanumeric" => "Normal"));

        MeasureRange::create(array("measure_id" => $measure3->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measure3->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measure3->id, "alphanumeric" => "Normal"));

        MeasureRange::create(array("measure_id" => $measure4->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measure4->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measure4->id, "alphanumeric" => "Normal"));
        
        MeasureRange::create(array("measure_id" => $measure5->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure5->id, "alphanumeric" => "Negative"));

        MeasureRange::create(array("measure_id" => $measure6->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure6->id, "alphanumeric" => "Negative"));

        MeasureRange::create(array("measure_id" => $measure7->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure7->id, "alphanumeric" => "Negative"));
        $measures = array(
            array("measure_type_id" => "1", "name" => "URIC ACID", "unit" => "mg/dl"),
            array("measure_type_id" => "4", "name" => "CSF for biochemistry", "unit" => ""),
            array("measure_type_id" => "4", "name" => "PSA", "unit" => ""),
            array("measure_type_id" => "1", "name" => "Total", "unit" => "mg/dl"),
            array("measure_type_id" => "1", "name" => "Alkaline Phosphate", "unit" => "u/l"),
            array("measure_type_id" => "1", "name" => "Direct", "unit" => "mg/dl"),
            array("measure_type_id" => "1", "name" => "Total Proteins", "unit" => ""),
            array("measure_type_id" => "4", "name" => "LFTS", "unit" => "NULL"),
            array("measure_type_id" => "1", "name" => "Chloride", "unit" => "mmol/l"),
            array("measure_type_id" => "1", "name" => "Potassium", "unit" => "mmol/l"),
            array("measure_type_id" => "1", "name" => "Sodium", "unit" => "mmol/l"),
            array("measure_type_id" => "4", "name" => "Electrolytes", "unit" => ""),
            array("measure_type_id" => "1", "name" => "Creatinine", "unit" => "mg/dl"),
            array("measure_type_id" => "1", "name" => "Urea", "unit" => "mg/dl"),
            array("measure_type_id" => "4", "name" => "RFTS", "unit" => ""),
            array("measure_type_id" => "4", "name" => "TFT", "unit" => ""),
        );

        foreach ($measures as $measure)
        {
            Measure::create($measure);
        }
        $measureGXM = Measure::create(array("measure_type_id" => "4", "name" => "GXM", "unit" => ""));
        $measureBG = Measure::create(
            array("measure_type_id" => "2",
                "name" => "Blood Grouping", 
                "unit" => ""));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "O-"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "O+"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "A-"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "A+"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "B-"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "B+"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "AB-"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "AB+"));        
        $measureHB = Measure::create(array("measure_type_id" => Measure::NUMERIC, "name" => "HB", 
            "unit" => "g/dL"));

        $measuresUrinalysisData = array(
            array("measure_type_id" => "4", "name" => "Urine microscopy", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Pus cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "S. haematobium", "unit" => ""),
            array("measure_type_id" => "4", "name" => "T. vaginalis", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Yeast cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Red blood cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Bacteria", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Spermatozoa", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Epithelial cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "ph", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Urine chemistry", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Glucose", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Ketones", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Proteins", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Blood", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Bilirubin", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Urobilinogen Phenlpyruvic acid", "unit" => ""),
            array("measure_type_id" => "4", "name" => "pH", "unit" => "")
            );

        foreach ($measuresUrinalysisData as $measureU) {
            $measuresUrinalysis[] = Measure::create($measureU);
        }

        /* Test Types table */
        $testTypeStoolCS = TestType::create(array("name" => "Stool for C/S", "test_category_id" => $lab_section_microbiology->id));

        $this->command->info('test_types seeded');

        /* Patients table */
        $patients_array = array(
            array("name" => "Jam Felicia", "email" => "fj@x.com", "patient_number" => "1002", "dob" => "2000-01-01", "gender" => "1", "created_by" => "2"),
            array("name" => "Emma Wallace", "email" => "emma@snd.com", "patient_number" => "1003", "dob" => "1990-03-01", "gender" => "1", "created_by" => "2"),
            array("name" => "Jack Tee", "email" => "info@jt.co.ke", "patient_number" => "1004", "dob" => "1999-12-18", "gender" => "0", "created_by" => "1"),
            array("name" => "Hu Jintao", "email" => "hu@.un.org", "patient_number" => "1005", "dob" => "1956-10-28", "gender" => "0", "created_by" => "2"),
            array("name" => "Lance Opiyo", "email" => "lance@x.com", "patient_number" => "2150", "dob" => "2012-01-01", "gender" => "0", "created_by" => "1"));
        foreach ($patients_array as $pat) {
            $patients[] = UnhlsPatient::create($pat);
        }

        $this->command->info('patients seeded');

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
          array("id" => "5","name" => "verified","test_phase_id" => "3")//Post-Analytical
        );
        foreach ($test_statuses as $test_status)
        {
            TestStatus::create($test_status);
        }
        $this->command->info('test_statuses seeded');

        /* Specimen Status table */
        $specimen_statuses = array(
          array("id" => "1", "name" => "specimen-not-collected"),
          array("id" => "2", "name" => "specimen-accepted"),
          array("id" => "3", "name" => "specimen-rejected")
        );
        foreach ($specimen_statuses as $specimen_status)
        {
            SpecimenStatus::create($specimen_status);
        }
        $this->command->info('specimen_statuses seeded');

        /* Visits table */
        
        for ($i=0; $i < 7; $i++) { 
            $visits[] = UnhlsVisit::create(array("patient_id" => $patients[rand(0,count($patients)-1)]->id));
        }
        $this->command->info('visits seeded');

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

        /* Instruments table */
        $instrumentsData = array(
            "name" => "Celltac F Mek 8222",
            "description" => "Automatic analyzer with 22 parameters and WBC 5 part diff Hematology Analyzer",
            "driver_name" => "KBLIS\\Plugins\\CelltacFMachine",
            "ip" => "192.168.1.12",
            "hostname" => "HEMASERVER"
        );
        
        $instrument = Instrument::create($instrumentsData);

        //Seed for drugs
        $penicillin = Drug::create(array('name' => "PENICILLIN"));
        $ampicillin = Drug::create(array('name' => "AMPICILLIN"));
        $clindamycin = Drug::create(array('name' => "CLINDAMYCIN"));
        $tetracycline = Drug::create(array('name' => "TETRACYCLINE"));
        $ciprofloxacin = Drug::create(array('name' => "CIPROFLOXACIN"));
        $trimeth = Drug::create(array('name' => "TRIMETHOPRIM/SULFA"));
        $nitrofurantoin = Drug::create(array('name' => "NITROFURANTOIN"));
        $chloramphenicol = Drug::create(array('name' => "CHLORAMPHENICOL"));
        $cefazolin = Drug::create(array('name' => "CEFAZOLIN"));
        $gentamicin = Drug::create(array('name' => "GENTAMICIN"));
        $amoxicillin = Drug::create(array('name' => "AMOXICILLIN-CLAV"));
        $cephalothin = Drug::create(array('name' => "CEPHALOTHIN"));
        $cefuroxime = Drug::create(array('name' => "CEFUROXIME"));
        $cefotaxime = Drug::create(array('name' => "CEFOTAXIME"));
        $piperacillin = Drug::create(array('name' => "PIPERACILLIN"));
        $cefixime = Drug::create(array('name' => "CEFIXIME"));
        $ceftazidime = Drug::create(array('name' => "CEFTAZIDIME"));
        $cefriaxone = Drug::create(array('name' => "CEFRIAXONE"));
        $levofloxacin = Drug::create(array('name' => "LEVOFLOXACIN"));
        $merodenem = Drug::create(array('name' => "MERODENEM"));
        $imedenem = Drug::create(array('name' => "IMEDENEM"));
        $oxacillin = Drug::create(array('name' => "OXACILLIN (CEFOXITIN)"));
        $erythromycin = Drug::create(array('name' => "ERYTHROMYCIN"));
        $vancomycin = Drug::create(array('name' => "VANCOMYCIN"));
        $cefoxitin = Drug::create(array('name' => "CEFOXITIN"));
        $tobramycin = Drug::create(array('name' => "TOBRAMYCIN"));
        $sulbactam = Drug::create(array('name' => "AMPICILLIN-SULBACTAM"));
        $trimethoprim = Drug::create(array('name' => "TRIMETHOPRIM"));
        $amikacin = Drug::create(['name' => 'AMIKACIN']);
        $augmentin = Drug::create(['name' => 'AUGMENTIN']);
        $ceftriaxione = Drug::create(['name' => 'CEFTRIAXIONE']);
        $cotrimoxazole = Drug::create(['name' => 'CO-TRIMOXAZOLE']);
        $imipenem = Drug::create(['name' => 'IMIPENEM']);
        $meropenem = Drug::create(['name' => 'MEROPENEM']);
        $peperacillintazobactam = Drug::create(['name' => 'PIPERACILLIN/TAZO']);

        $this->command->info('Drugs table seeded');
        //Seed for organisims
        $staphylococci = Organism::create(array('name' => "Staphylococci species"));
        $gramnegative = Organism::create(array('name' => "Gram negative cocci"));
        $pseudomonas = Organism::create(array('name' => "Pseudomonas aeruginosa"));
        $enterococcus = Organism::create(array('name' => "Enterococcus species"));
        $pneumoniae = Organism::create(array('name' => "Streptococcus pneumoniae"));
        $streptococcus = Organism::create(array('name' => "Streptococcus species viridans group"));
        $beta = Organism::create(array('name' => "Beta-haemolytic streptococci"));
        $haemophilus = Organism::create(array('name' => "Haemophilus influenzae"));
        $naisseria = Organism::create(array('name' => "Naisseria menengitidis"));
        $salmonella = Organism::create(array('name' => "Salmonella species"));
        $shigella = Organism::create(array('name' => "Shigella"));
        $vibrio = Organism::create(array('name' => "Vibrio cholerae"));
        $grampositive = Organism::create(array('name' => "Gram positive cocci"));
        $ecoli = Organism::create(['name' => 'E.coli']);
        $oralPharyngealFlora = Organism::create(['name' => 'Oral-pharyngeal flora']);

        $this->command->info('Organisms table seeded');
        $microbiologyVisit = UnhlsVisit::create(["patient_id" => 1]);

        $specimenTypeSputum = SpecimenType::create(["name" => "Sputum"]);
        $this->command->info("Specimen Types Seeded");

        $specimenSputum = UnhlsSpecimen::create([
            "specimen_type_id" => $specimenTypeSputum->id,
            "specimen_status_id" => UnhlsSpecimen::ACCEPTED,
            "accepted_by" => 1,
            "time_accepted" => date('Y-m-d H:i:s')]);
        $this->command->info("Specimen Seeded");

        $testTypeCultureSensitivity = TestType::create([
                "name" => "Culture and Sensitivity",
                "test_category_id" => $lab_section_microbiology->id,
                "orderable_test" => 1
        ]);
        $testTypeAppearance = TestType::create([
            'name' => 'Microscopic Appearance',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);
        $testTypeGramStain = TestType::create([
            'name' => 'Gram stain',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);
        $testTypeZnStain = TestType::create([
            'name' => 'ZN staining',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);
        $testTypeModifiedZn = TestType::create([
            'name' => 'Modified ZN',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);
        $testTypeWetSalineIodinePrep = TestType::create([
            'name' => 'Wet Saline Iodine Prep',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);

        $measureAppearance = Measure::create(['measure_type_id' => '4', 'name' => 'Appearance', 'unit' => '']);
        $measureGramStain = Measure::create(['measure_type_id' => '4', 'name' => 'Gram stain', 'unit' => '']);
        $measureZnStain = Measure::create(['measure_type_id' => '4', 'name' => 'ZN stain', 'unit' => '']);
        $measureModifiedZn = Measure::create(['measure_type_id' => '4', 'name' => 'Modified ZN', 'unit' => '']);
        $measureWetSalineIodinePrep = Measure::create(['measure_type_id' => '4', 'name' => 'Wet Saline Iodine Prep', 'unit' => '']);
        $measureAST = Measure::create(['measure_type_id' => '4', 'name' => 'AST', 'unit' => '']);
        
        $this->command->info("Measures seeded");

        // todo: create a loop for this... save some space!
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCultureSensitivity->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood

        $testAST = UnhlsTest::create([
                "visit_id" => $microbiologyVisit->id,
                "test_type_id" => $testTypeCultureSensitivity->id,
                'specimen_id' => $specimenSputum->id,
                "interpretation" => "Format being deliberated",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-10-17 19:16:15",
                "time_started" => "2014-10-17 19:17:15",
                "time_completed" => "2014-10-17 19:52:40",
                "time_verified" => "2014-10-17 19:53:48",
        ]);
        $testAppearanceMucoSalivary = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeAppearance->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testGramStain = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeGramStain->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testZnStain = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeZnStain->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testAppearanceFormed = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeAppearance->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testModifiedZn = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeModifiedZn->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testWetSalineIodinePrep = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeWetSalineIodinePrep->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $cultureDurationAST12h = CultureDuration::create(['duration' => '12 hours',]);
        $cultureDurationAST24h = CultureDuration::create(['duration' => '24 hours',]);
        $cultureDurationAST36h = CultureDuration::create(['duration' => '36 hours',]);
        $cultureDurationAST48h = CultureDuration::create(['duration' => '48 hours',]);
        $cultureDurationAST60h = CultureDuration::create(['duration' => '60 hours',]);
        $cultureDurationAST72h = CultureDuration::create(['duration' => '72 hours',]);
        $cultureDurationAST4d = CultureDuration::create(['duration' => '4 days',]);
        $cultureDurationAST5d = CultureDuration::create(['duration' => '5 days',]);
        $cultureDurationAST6d = CultureDuration::create(['duration' => '6 days',]);
        $cultureDurationAST7d = CultureDuration::create(['duration' => '7 days',]);
        $cultureObservationAST = CultureObservation::create([
            'user_id' => $user1->id,
            'test_id' => $testAST->id,
            'culture_duration_id' => $cultureDurationAST48h->id,
            'observation' => 'NBG',
        ]);
        $cultureObservationAST = CultureObservation::create([
            'user_id' => $user1->id,
            'test_id' => $testAST->id,
            'culture_duration_id' => $cultureDurationAST5d->id,
            'observation' => 'NSG',
        ]);
        $cultureObservationAST = CultureObservation::create([
            'user_id' => $user1->id,
            'test_id' => $testAST->id,
            'culture_duration_id' => $cultureDurationAST7d->id,
            'observation' => 'SG',
        ]);

        $isolatedOrganism = IsolatedOrganism::create([
            'user_id' => $user1->id,
            'test_id' => $testAST->id,
            'organism_id' => $pneumoniae->id,
        ]);

        $drugSusceptibilityMeasureS = DrugSusceptibilityMeasure::create([
            'symbol' => 'S',
            'interpretation'=>'Sensitive',
        ]);
        $drugSusceptibilityMeasureI = DrugSusceptibilityMeasure::create([
            'symbol' => 'I',
            'interpretation'=>'Intermediate',
        ]);
        $drugSusceptibilityMeasureR = DrugSusceptibilityMeasure::create([
            'symbol' => 'R',
            'interpretation'=>'Resistant',
        ]);
        $drugSusceptibilityChloramphenicol = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $chloramphenicol->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        $drugSusceptibilityClindamycin = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $clindamycin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureS->id,
        ]);
        $drugSusceptibilityErythromycin = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $erythromycin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        $drugSusceptibilityTetracycline = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $tetracycline->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        $drugSusceptibilityTrimethoprim = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $trimethoprim->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);

        UnhlsTestResult::create([
            'test_id' => $testAppearanceMucoSalivary->id,
            'measure_id' => $measureAppearance->id,
            'result' => 'Muco-Salivary',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testGramStain->id,
            'measure_id' => $measureGramStain->id,
            'result' => '3+ Gram positive diplococci,1+ Gram negative cocci,<5 pmns and 5-10 epithelial cells seen.',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testZnStain->id,
            'measure_id' => $measureZnStain->id,
            'result' => 'No AFB seen',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testAppearanceFormed->id,
            'measure_id' => $measureAppearance->id,
            'result' => 'Formed',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testModifiedZn->id,
            'measure_id' => $measureModifiedZn->id,
            'result' => 'No Oocysts seen.',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testWetSalineIodinePrep->id,
            'measure_id' => $measureWetSalineIodinePrep->id,
            'result' => 'No Ova/cysts seen.',
        ]);

        UnhlsTestResult::create([
            'test_id' => $testAST->id,
            'measure_id' => $measureAST->id,
            'result' => 'General Comment',
        ]);
    }
}
