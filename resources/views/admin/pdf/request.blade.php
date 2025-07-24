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
    <tr><td>Registration Number</td><td>{{ $requestData->detail->reg_number }}</td></tr>
    <tr><td>Old Registration Number</td><td>{{ $requestData->detail->old_reg_number }}</td></tr>
    <tr><td>Registration State</td><td>{{ $requestData->detail->reg_state }}</td></tr>
    <tr><td>Registration Office</td><td>{{ $requestData->detail->reg_office }}</td></tr>
    <tr><td>Fitness Valid Upto</td><td>{{ $requestData->detail->fitness_valid_upto }}</td></tr>
    <tr><td>Registration Valid Upto</td><td>{{ $requestData->detail->registration_valid_upto }}</td></tr>
  </table>

  <h2>Finance Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Financer</td><td>{{ $requestData->detail->financer }}</td></tr>
  </table>

  <h2>Owner Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Owner Name</td><td>{{ $requestData->detail->owner_name }}</td></tr>
    <tr><td>S/W/D Of</td><td>{{ $requestData->detail->swdo_of }}</td></tr>
    <tr><td>Ownership Serial</td><td>{{ $requestData->detail->ownership_serial }}</td></tr>
    <tr><td>Mobile Number</td><td>{{ $requestData->detail->mobile_number }}</td></tr>
    <tr><td>Current Address</td><td>{{ $requestData->detail->current_address }}</td></tr>
    <tr><td>Permanent Address</td><td>{{ $requestData->detail->permanent_address }}</td></tr>
  </table>

  <h2>Vehicle Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Maker</td><td>{{ $requestData->detail->maker }}</td></tr>
    <tr><td>Model</td><td>{{ $requestData->detail->model }}</td></tr>
    <tr><td>Vehicle Class</td><td>{{ $requestData->detail->vehicle_class }}</td></tr>
    <tr><td>Vehicle Category</td><td>{{ $requestData->detail->vehicle_category }}</td></tr>
    <tr><td>Emission Norms</td><td>{{ $requestData->detail->emission_norms }}</td></tr>
    <tr><td>Chassis Number</td><td>{{ $requestData->detail->chassis_number }}</td></tr>
    <tr><td>Engine Number</td><td>{{ $requestData->detail->engine_number }}</td></tr>
    <tr><td>Seating Capacity</td><td>{{ $requestData->detail->seating_capacity }}</td></tr>
    <tr><td>Standing Capacity</td><td>{{ $requestData->detail->standing_capacity }}</td></tr>
    <tr><td>Sleeper Capacity</td><td>{{ $requestData->detail->sleeper_capacity }}</td></tr>
    <tr><td>No of Cylinders</td><td>{{ $requestData->detail->number_of_cylinders }}</td></tr>
    <tr><td>Unladen Weight</td><td>{{ $requestData->detail->unladen_weight }}</td></tr>
    <tr><td>Laden Weight</td><td>{{ $requestData->detail->laden_weight }}</td></tr>
    <tr><td>Fuel</td><td>{{ $requestData->detail->fuel }}</td></tr>
    <tr><td>Color</td><td>{{ $requestData->detail->color }}</td></tr>
    <tr><td>Wheelbase</td><td>{{ $requestData->detail->wheelbase }}</td></tr>
    <tr><td>Cubic Capacity</td><td>{{ $requestData->detail->cubic_capacity }}</td></tr>
    <tr><td>Manufacture Month/Year</td><td>{{ $requestData->detail->manufacture_month_year }}</td></tr>
    <tr><td>Body Type</td><td>{{ $requestData->detail->body_type }}</td></tr>
  </table>

  <h2>NOC Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>NOC Number</td><td>{{ $requestData->detail->noc_number }}</td></tr>
    <tr><td>NOC Issue Date</td><td>{{ $requestData->detail->noc_issue_date }}</td></tr>
  </table>

  <h2>Insurance Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Insurance Type</td><td>{{ $requestData->detail->insurance_type }}</td></tr>
    <tr><td>Insurance Company</td><td>{{ $requestData->detail->insurance_company }}</td></tr>
    <tr><td>Policy Number</td><td>{{ $requestData->detail->insurance_policy_number }}</td></tr>
    <tr><td>Valid From</td><td>{{ $requestData->detail->insurance_from_date }}</td></tr>
    <tr><td>Valid To</td><td>{{ $requestData->detail->insurance_to_date }}</td></tr>
  </table>

  <h2>PUCC Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>PUCC Number</td><td>{{ $requestData->detail->pucc_number }}</td></tr>
    <tr><td>PUCC Form</td><td>{{ $requestData->detail->pucc_form }}</td></tr>
    <tr><td>PUCC Upto</td><td>{{ $requestData->detail->pucc_upto }}</td></tr>
  </table>

  <h2>Permit Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Permit Number</td><td>{{ $requestData->detail->permit_number }}</td></tr>
    <tr><td>Permit Type</td><td>{{ $requestData->detail->permit_type }}</td></tr>
    <tr><td>Valid From</td><td>{{ $requestData->detail->permit_valid_from }}</td></tr>
    <tr><td>Valid Upto</td><td>{{ $requestData->detail->permit_valid_upto }}</td></tr>
  </table>

  <h2>Tax Information</h2>
  <table>
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Tax Type</td><td>{{ $requestData->detail->tax_type }}</td></tr>
    <tr><td>Tax Amount</td><td>{{ $requestData->detail->tax_amount }}</td></tr>
    <tr><td>Tax From</td><td>{{ $requestData->detail->tax_from }}</td></tr>
    <tr><td>Tax Upto</td><td>{{ $requestData->detail->tax_upto }}</td></tr>
  </table>
</body>
</html>
