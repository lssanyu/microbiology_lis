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
        
        /* Test Categories table - These map on to the lab sections */
        $testTypeCategory = TestCategory::create(array("name" => "MICROBIOLOGY","description" => ""));

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

        //Seed for organisims
        $staphylococci = Organism::create(['name' => "Staphylococci species"]);
        $gramnegative = Organism::create(['name' => "Gram negative cocci"]);
        $pseudomonas = Organism::create(['name' => "Pseudomonas aeruginosa"]);
        $enterococcus = Organism::create(['name' => "Enterococcus species"]);
        $pneumoniae = Organism::create(['name' => "Streptococcus pneumoniae"]);
        $streptococcus = Organism::create(['name' => "Streptococcus species viridans group"]);
        $beta = Organism::create(['name' => "Beta-haemolytic streptococci"]);
        $haemophilus = Organism::create(['name' => "Haemophilus influenzae"]);
        $naisseria = Organism::create(['name' => "Naisseria menengitidis"]);
        $salmonella = Organism::create(['name' => "Salmonella species"]);
        $shigella = Organism::create(['name' => "Shigella"]);
        $vibrio = Organism::create(['name' => "Vibrio cholerae"]);
        $grampositive = Organism::create(['name' => "Gram positive cocci"]);
        $ecoli = Organism::create(['name' => 'E.coli']);
        $oralPharyngealFlora = Organism::create(['name' => 'Oral-pharyngeal flora']);

        $this->command->info('Organisms table seeded');
        // specimen types
        $specimenTypeStool = SpecimenType::create(["name" => "Stool"]);
        $specimenTypeCSF = SpecimenType::create(["name" => "CSF"]);
        $specimenTypeWoundSwab = SpecimenType::create(["name" => "Wound swab"]);
        $specimenTypePusSwab = SpecimenType::create(["name" => "Pus swab"]);
        $specimenTypeHVS = SpecimenType::create(["name" => "HVS"]);
        $specimenTypeEyeSwab = SpecimenType::create(["name" => "Eye swab"]);
        $specimenTypeEarSwab = SpecimenType::create(["name" => "Ear swab"]);
        $specimenTypeThroatSwab = SpecimenType::create(["name" => "Throat swab"]);
        $specimenTypeAspirates = SpecimenType::create(["name" => "Aspirates"]);
        $specimenTypeBlood = SpecimenType::create(["name" => "Blood"]);
        $specimenTypeBAL = SpecimenType::create(["name" => "BAL"]);
        $specimenTypeSputum = SpecimenType::create(["name" => "Sputum"]);
        $specimenTypeUretheralSwab = SpecimenType::create(["name" => "Uretheral swab"]);
        $specimenTypeUrine = SpecimenType::create(["name" => "Urine"]);


        // test types
        $testTypeAppearance = TestType::create([
            'name' => 'Microscopic Appearance',
            'test_category_id' => $testTypeCategory->id,
        ]);
        $testTypeCultureAndSensitivity = TestType::create([
            "name" => "Culture and Sensitivity",
            "test_category_id" => $testTypeCategory->id
        ]);
        $testTypeGramStaining = TestType::create([
            "name" => "Gram staining",
            "test_category_id" => $testTypeCategory->id
        ]);
        $testTypeIndiaInkStaining = TestType::create([
            "name" => "India Ink staining",
            "test_category_id" => $testTypeCategory->id
        ]);
        $testTypeProtein = TestType::create([
            "name" => "Protein",
            "test_category_id" => $testTypeCategory->id
        ]);
        $testTypeWetPreparation = TestType::create([
            "name" => "Wet preparation (saline preparation)",
            "test_category_id" => $testTypeCategory->id
        ]);
        $testTypeWetSalineIodinePrep = TestType::create([
            'name' => 'Wet Saline Iodine Prep',
            'test_category_id' => $testTypeCategory->id,
        ]);
        $testTypeWhiteBloodCellCount = TestType::create([
            "name" => "White blood cell count",
            "test_category_id" => $testTypeCategory->id
        ]);
        $testTypeZNStaining = TestType::create([
            "name" => "ZN staining",
            "test_category_id" => $testTypeCategory->id
        ]);
        $testTypeModifiedZn = TestType::create([
            'name' => 'Modified ZN',
            'test_category_id' => $testTypeCategory->id,
        ]);
        $testTypeUrinalysis = TestType::create([
            "name" => "Urinalysis",
            "test_category_id" => $testTypeCategory->id,
        ]);

        /* Measures table */
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


        $measureAppearance = Measure::create(['measure_type_id' => '4',
            'name' => 'Appearance', 'unit' => '']);
        $measureCultureAndSensitivity = Measure::create([
            "measure_type_id" => "4",
            "name" => "Culture and Sensitivity"]);
        $measureGramStaining = Measure::create([
            "measure_type_id" => "2",
            "name" => "Gram staining"]);
        $measureIndiaInkStaining = Measure::create([
            "measure_type_id" => "4",
            "name" => "India Ink staining"]);
        $measureProtein = Measure::create([
            "measure_type_id" => "4",
            "name" => "Protein"]);
        $measureWetPreparation = Measure::create([
            "measure_type_id" => "4",
            "name" => "Wet preparation (saline preparation)"]);
        $measureWhiteBloodCellCount = Measure::create([
            "measure_type_id" => "4",
            "name" => "White blood cell count"]);
        $measureZNStaining = Measure::create([
            "measure_type_id" => "4",
            "name" => "ZN staining"]);

        $measureModifiedZn = Measure::create(['measure_type_id' => '4',
            'name' => 'Modified ZN', 'unit' => '']);
        $measureWetSalineIodinePrep = Measure::create(['measure_type_id' => '4',
            'name' => 'Wet Saline Iodine Prep', 'unit' => '']);
        $measureAST = Measure::create(['measure_type_id' => '4',
            'name' => 'AST', 'unit' => '']);

        $measureSerumAmylase = Measure::create([
            "measure_type_id" => "2",
            "name" => "SERUM AMYLASE", "unit" => ""]);
        $measureCalcium = Measure::create([
            "measure_type_id" => "2",
            "name" => "calcium", "unit" => ""]);
        $measureSGOT = Measure::create([
            "measure_type_id" => "2",
            "name" => "SGOT", "unit" => ""]);
        $measureIndirectCOOMBSTest = Measure::create([
            "measure_type_id" => "2",
            "name" => "Indirect COOMBS test", "unit" => ""]);
        $measureDirectCOOMBSTest = Measure::create([
            "measure_type_id" => "2",
            "name" => "Direct COOMBS test", "unit" => ""]);
        $measureDuTest = Measure::create([
            "measure_type_id" => "2",
            "name" => "Du test", "unit" => ""]);
        
        
        MeasureRange::create(array("measure_id" => $measureGramStaining->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measureGramStaining->id, "alphanumeric" => "Positive"));

        MeasureRange::create(array("measure_id" => $measureSerumAmylase->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measureSerumAmylase->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measureSerumAmylase->id, "alphanumeric" => "Normal"));

        MeasureRange::create(array("measure_id" => $measureCalcium->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measureCalcium->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measureCalcium->id, "alphanumeric" => "Normal"));

        MeasureRange::create(array("measure_id" => $measureSGOT->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measureSGOT->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measureSGOT->id, "alphanumeric" => "Normal"));
        
        MeasureRange::create(array("measure_id" => $measureIndirectCOOMBSTest->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureIndirectCOOMBSTest->id, "alphanumeric" => "Negative"));

        MeasureRange::create(array("measure_id" => $measureDirectCOOMBSTest->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureDirectCOOMBSTest->id, "alphanumeric" => "Negative"));

        MeasureRange::create(array("measure_id" => $measureDuTest->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureDuTest->id, "alphanumeric" => "Negative"));


        $this->command->info("Measures seeded");


        // test type measure
        $testtypeMeasureCultureAndSensitivity = TestTypeMeasure::create([
            "test_type_id" => $testTypeCultureAndSensitivity->id,
            "measure_id" => $measureCultureAndSensitivity->id
        ]);
        $testtypeMeasureGramStaining = TestTypeMeasure::create([
            "test_type_id" => $testTypeGramStaining->id,
            "measure_id" => $measureGramStaining->id
        ]);
        $testtypeMeasureIndiaInkStaining = TestTypeMeasure::create([
            "test_type_id" => $testTypeIndiaInkStaining->id,
            "measure_id" => $measureIndiaInkStaining->id
        ]);
        $testtypeMeasureProtein = TestTypeMeasure::create([
            "test_type_id" => $testTypeProtein->id,
            "measure_id" => $measureProtein->id
        ]);
        $testtypeMeasureWetPreparation = TestTypeMeasure::create([
            "test_type_id" => $testTypeWetPreparation->id,
            "measure_id" => $measureWetPreparation->id
        ]);
        $testtypeMeasureWhiteBloodCellCount = TestTypeMeasure::create([
            "test_type_id" => $testTypeWhiteBloodCellCount->id,
            "measure_id" => $measureWhiteBloodCellCount->id
        ]);
        $testtypeMeasureZNStaining = TestTypeMeasure::create([
            "test_type_id" => $testTypeZNStaining->id,
            "measure_id" => $measureZNStaining->id
        ]);

        foreach ($measuresUrinalysis as $measureUrinalysis) {
            TestTypeMeasure::create([
                "test_type_id" => $testTypeUrinalysis->id,
                "measure_id" => $measureUrinalysis->id
            ]);
        }


        // test type specimen types
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeStool->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeProtein->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeIndiaInkStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeWhiteBloodCellCount->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeCSF->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypePusSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypePusSwab->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypePusSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeWoundSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeWoundSwab->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeWoundSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUretheralSwab->id,
            "test_type_id" => $testTypeWetPreparation->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUretheralSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUretheralSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeHVS->id,
            "test_type_id" => $testTypeWetPreparation->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeHVS->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeHVS->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEyeSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEyeSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEarSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeEarSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeThroatSwab->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeThroatSwab->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeProtein->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeAspirates->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBlood->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBAL->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBAL->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeBAL->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeSputum->id,
            "test_type_id" => $testTypeZNStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeSputum->id,
            "test_type_id" => $testTypeGramStaining->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeSputum->id,
            "test_type_id" => $testTypeCultureAndSensitivity->id
        ]);
        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUretheralSwab->id,
            "test_type_id" => $testTypeUrinalysis->id
        ]);

        DB::table('testtype_specimentypes')->insert([
            "specimen_type_id" => $specimenTypeUrine->id,
            "test_type_id" => $testTypeUrinalysis->id
        ]);


        //Seed for drugs
        $ampicillin = Drug::create(['name' => 'Ampicillin']);
        $amoxyClavulan = Drug::create(['name' => 'Amoxy-Clavulan']);
        $amikacin = Drug::create(['name' => 'Amikacin']);
        $azithromycin = Drug::create(['name' => 'Azithromycin']);
        $aztreonam = Drug::create(['name' => 'Aztreonam']);
        $azobacter = Drug::create(['name' => 'Azobacter']);
        $cefuroxime = Drug::create(['name' => 'Cefuroxime']);
        $ceftriaxone = Drug::create(['name' => 'Ceftriaxone']);
        $cefepime = Drug::create(['name' => 'Cefepime']);
        $ceftazidime = Drug::create(['name' => 'Ceftazidime']);
        $cephazoline = Drug::create(['name' => 'Cephazoline']);
        $cefotaxime = Drug::create(['name' => 'Cefotaxime']);
        $cefixime = Drug::create(['name' => 'Cefixime']);
        $cefoxitin = Drug::create(['name' => 'Cefoxitin']);
        $cephalothin = Drug::create(['name' => 'Cephalothin']);
        $chloramphenicol = Drug::create(['name' => 'Chloramphenicol']);
        $ciprofloxacin = Drug::create(['name' => 'Ciprofloxacin']);
        $clindamycin = Drug::create(['name' => 'Clindamycin']);
        // todo: the next two look similar which do I go with?
        $collistinPolymixinB = Drug::create(['name' => 'Collistin/Polymixin B']);
        $polymixinB = Drug::create(['name' => 'Polymixin B']);
        // todo: the next three look similar which do I go with?
        $trimeth = Drug::create(array('name' => "Trimethoprim/Sulfa"));
        $trimethoprim = Drug::create(array('name' => "Trimethoprim"));
        $trimethoprimSulphamethoxazole = Drug::create(['name' => 'Trimethoprim/Sulphamethoxazole']);
        $erythromycin = Drug::create(['name' => 'Erythromycin']);
        $gentamicin = Drug::create(['name' => 'Gentamicin']);
        $imipenem = Drug::create(['name' => 'Imipenem']);
        $levofloxacin = Drug::create(['name' => 'Levofloxacin']);
        $linezolid = Drug::create(['name' => 'Linezolid']);
        $meropenem = Drug::create(['name' => 'Meropenem']);
        $mezlocillin = Drug::create(['name' => 'Mezlocillin']);
        $minocycline = Drug::create(['name' => 'Minocycline']);
        $norfloxacin = Drug::create(['name' => 'Norfloxacin']);
        $nitrofurantoin = Drug::create(['name' => 'Nitrofurantoin']);
        $nalidixicAcid = Drug::create(['name' => 'Nalidixic Acid']);
        // todo: the next two look similar which do I go with?
        $ofloxacin = Drug::create(['name' => 'Ofloxacin']);
        $ofloxacinSparfloxacin = Drug::create(['name' => 'Ofloxacin/Sparfloxacin']);
        // todo: the next two look similar which do I go with?
        // $oxacillin = Drug::create(array('name' => "OXACILLIN (CEFOXITIN)"));
        $oxacillin = Drug::create(['name' => 'Oxacillin']);
        $sparfloxacin = Drug::create(['name' => 'Sparfloxacin']);
        $penicillinG = Drug::create(['name' => 'Penicillin G']);
        $piperacillin = Drug::create(['name' => 'Piperacillin']);
        $spectinomycin = Drug::create(['name' => 'Spectinomycin']);
        $sulfisoxazole = Drug::create(['name' => 'Sulfisoxazole']);
        $tetracycline = Drug::create(['name' => 'Tetracycline']);
        $tazobacter = Drug::create(['name' => 'Tazobacter']);
        $vancomycin = Drug::create(['name' => 'Vancomycin']);
        // todo: the ones below were not on the last list, shall I remove them?
        $cefazolin = Drug::create(array('name' => "Cefazolin"));
        $amoxicillin = Drug::create(array('name' => "Amoxicillin-Clav"));
        $cefriaxone = Drug::create(array('name' => "Cefriaxone"));
        $merodenem = Drug::create(array('name' => "Merodenem"));
        $imedenem = Drug::create(array('name' => "Imedenem"));
        $tobramycin = Drug::create(array('name' => "Tobramycin"));
        $sulbactam = Drug::create(array('name' => "Ampicillin-Sulbactam"));
        $augmentin = Drug::create(['name' => 'Augmentin']);
        $ceftriaxione = Drug::create(['name' => 'Ceftriaxione']);
        $cotrimoxazole = Drug::create(['name' => 'Co-Trimoxazole']);
        $peperacillintazobactam = Drug::create(['name' => 'Piperacillin/Tazo']);
        $chlorampenicol = Drug::create(['name' => 'Chlorampenicol']);
        $rifampicin = Drug::create(['name' => 'Rifampicin']);

        $this->command->info('Drugs table seeded');

        // Subsequent Investigative Predeterminations
        $gramPositives = SubsequentInvestigativePredetermination::create(['name' => 'Gram Positives']);
        $gramNegatives = SubsequentInvestigativePredetermination::create(['name' => 'Gram Negatives']);
        $urinaryGramNegatives = SubsequentInvestigativePredetermination::create(['name' => 'Urinary Gram Negatives']);
        $pseudomonas= SubsequentInvestigativePredetermination::create(['name' => 'Pseudomonas']);
        $shigellaSalmonella = SubsequentInvestigativePredetermination::create(['name' => 'Shigella/Salmonella']);
        $nisseiriaGonorrhoeae = SubsequentInvestigativePredetermination::create(['name' => 'Nisseiria Gonorrhoeae']);

        $this->command->info('Subsequent Investigative Predeterminations table seeded');

        // Drug and Subsequent Investigative Predetermination mapping
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $ampicillin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $penicillinG->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $chlorampenicol->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $erythromycin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $azithromycin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $oxacillin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $cotrimoxazole->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $tetracycline->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $ciprofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $vancomycin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $clindamycin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $gentamicin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $cephalothin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $ceftriaxone->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $cefixime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $levofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $linezolid->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $ofloxacinSparfloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramPositives->id,
            "drug_id" => $rifampicin->id,
        ]);


        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $ampicillin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $ceftriaxone->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $amoxyClavulan->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $piperacillin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $cotrimoxazole->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $ciprofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $chloramphenicol->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $cefuroxime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $gentamicin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $levofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $ofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $imipenem->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $collistinPolymixinB->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $cefepime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $ceftazidime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $aztreonam->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $tetracycline->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $mezlocillin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $gramNegatives->id,
            "drug_id" => $minocycline->id,
        ]);


        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $ampicillin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $cotrimoxazole->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $amoxyClavulan->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $nitrofurantoin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $nalidixicAcid->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $ciprofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $norfloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $cephalothin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $cefuroxime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $levofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $gentamicin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $amikacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $ceftriaxone->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $ofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $imipenem->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $meropenem->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $cefepime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $ceftazidime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $aztreonam->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $urinaryGramNegatives->id,
            "drug_id" => $minocycline->id,
        ]);

        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $piperacillin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $gentamicin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $ciprofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $ceftazidime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $imipenem->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $polymixinB->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $amikacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $meropenem->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $tazobacter->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $aztreonam->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $cefepime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $pseudomonas->id,
            "drug_id" => $levofloxacin->id,
        ]);

        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $shigellaSalmonella->id,
            "drug_id" => $nalidixicAcid->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $shigellaSalmonella->id,
            "drug_id" => $cotrimoxazole->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $shigellaSalmonella->id,
            "drug_id" => $ciprofloxacin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $shigellaSalmonella->id,
            "drug_id" => $chloramphenicol->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $shigellaSalmonella->id,
            "drug_id" => $imipenem->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $shigellaSalmonella->id,
            "drug_id" => $ceftriaxone->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $shigellaSalmonella->id,
            "drug_id" => $gentamicin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $shigellaSalmonella->id,
            "drug_id" => $tetracycline->id,
        ]);

        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $nisseiriaGonorrhoeae->id,
            "drug_id" => $penicillinG->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $nisseiriaGonorrhoeae->id,
            "drug_id" => $ceftriaxone->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $nisseiriaGonorrhoeae->id,
            "drug_id" => $cefixime->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $nisseiriaGonorrhoeae->id,
            "drug_id" => $azithromycin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $nisseiriaGonorrhoeae->id,
            "drug_id" => $spectinomycin->id,
        ]);
        DB::table('predetermination_drugs')->insert([
            "predetermination_id" => $nisseiriaGonorrhoeae->id,
            "drug_id" => $ciprofloxacin->id,
        ]);

        $this->command->info('Drug and Subsequent Investigative Predetermination mapping table seeded');

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

    }
}
