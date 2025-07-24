<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
    h2, h3 { margin: .5em 0 .2em; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { border: 1px solid #000; padding: 6px; vertical-align: top; }
    th { background: #f0f0f0; font-weight: bold; }
  </style>
</head>
<body>
  <h2>Registration Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Registration Number</td><td>{{ $request->reg_number }}</td></tr>
    <tr><td>Old Registration Number</td><td>{{ $request->old_reg_number }}</td></tr>
    <tr><td>Registration State</td><td>{{ $request->reg_state }}</td></tr>
    <tr><td>Registration Office</td><td>{{ $request->reg_office }}</td></tr>
    <tr><td>Fitness Valid Upto</td><td>{{ $request->fitness_valid_upto }}</td></tr>
    <tr><td>Registration Valid Upto</td><td>{{ $request->registration_valid_upto }}</td></tr>
  </table>

  <h2>Finance Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Financer</td><td>{{ $request->financer }}</td></tr>
  </table>

  <h2>Owner Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Owner Name</td><td>{{ $request->owner_name }}</td></tr>
    <tr><td>S/W/D Of</td><td>{{ $request->swdo_of }}</td></tr>
    <tr><td>Ownership Serial</td><td>{{ $request->ownership_serial }}</td></tr>
    <tr><td>Mobile Number</td><td>{{ $request->mobile_number }}</td></tr>
    <tr><td>Current Address</td><td>{{ $request->current_address }}</td></tr>
    <tr><td>Permanent Address</td><td>{{ $request->permanent_address }}</td></tr>
  </table>

  <h2>Vehicle Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Maker</td><td>{{ $request->maker }}</td></tr>
    <tr><td>Model</td><td>{{ $request->model }}</td></tr>
    <tr><td>Vehicle Class</td><td>{{ $request->vehicle_class }}</td></tr>
    <tr><td>Vehicle Category</td><td>{{ $request->vehicle_category }}</td></tr>
    <tr><td>Emission Norms</td><td>{{ $request->emission_norms }}</td></tr>
    <tr><td>Chassis Number</td><td>{{ $request->chassis_number }}</td></tr>
    <tr><td>Engine Number</td><td>{{ $request->engine_number }}</td></tr>
    <tr><td>Seating Capacity</td><td>{{ $request->seating_capacity }}</td></tr>
    <tr><td>Standing Capacity</td><td>{{ $request->standing_capacity }}</td></tr>
    <tr><td>Sleeper Capacity</td><td>{{ $request->sleeper_capacity }}</td></tr>
    <tr><td>No of Cylinders</td><td>{{ $request->number_of_cylinders }}</td></tr>
    <tr><td>Unladen Weight</td><td>{{ $request->unladen_weight }}</td></tr>
    <tr><td>Laden Weight</td><td>{{ $request->laden_weight }}</td></tr>
    <tr><td>Fuel</td><td>{{ $request->fuel }}</td></tr>
    <tr><td>Color</td><td>{{ $request->color }}</td></tr>
    <tr><td>Wheelbase</td><td>{{ $request->wheelbase }}</td></tr>
    <tr><td>Cubic Capacity</td><td>{{ $request->cubic_capacity }}</td></tr>
    <tr><td>Manufacture Month/Year</td><td>{{ $request->manufacture_month_year }}</td></tr>
    <tr><td>Body Type</td><td>{{ $request->body_type }}</td></tr>
  </table>

  <h2>NOC Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>NOC Number</td><td>{{ $request->noc_number }}</td></tr>
    <tr><td>NOC Issue Date</td><td>{{ $request->noc_issue_date }}</td></tr>
  </table>

  <h2>Insurance Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Insurance Type</td><td>{{ $request->insurance_type }}</td></tr>
    <tr><td>Insurance Company</td><td>{{ $request->insurance_company }}</td></tr>
    <tr><td>Policy Number</td><td>{{ $request->insurance_policy_number }}</td></tr>
    <tr><td>Valid From</td><td>{{ $request->insurance_from_date }}</td></tr>
    <tr><td>Valid To</td><td>{{ $request->insurance_to_date }}</td></tr>
  </table>

  <h2>PUCC Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>PUCC Number</td><td>{{ $request->pucc_number }}</td></tr>
    <tr><td>PUCC Form</td><td>{{ $request->pucc_form }}</td></tr>
    <tr><td>PUCC Upto</td><td>{{ $request->pucc_upto }}</td></tr>
  </table>

  <h2>Permit Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Permit Number</td><td>{{ $request->permit_number }}</td></tr>
    <tr><td>Permit Type</td><td>{{ $request->permit_type }}</td></tr>
    <tr><td>Valid From</td><td>{{ $request->permit_valid_from }}</td></tr>
    <tr><td>Valid Upto</td><td>{{ $request->permit_valid_upto }}</td></tr>
  </table>

  <h2>Tax Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Tax Type</td><td>{{ $request->tax_type }}</td></tr>
    <tr><td>Tax Amount</td><td>{{ $request->tax_amount }}</td></tr>
    <tr><td>Tax From</td><td>{{ $request->tax_from }}</td></tr>
    <tr><td>Tax Upto</td><td>{{ $request->tax_upto }}</td></tr>
  </table>
</body>
</html>
