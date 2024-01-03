<h1>Blood Request </h1>
<p>
    <span>Patient Name: {{ $patient->name }}</span><br>
    <span>Contact : {{ $patient->phone }}</span><br>
    <span>Blood Group: {{ $bloodRequest->asking_bg }}</span><br>
    <span>Hospital: {{ $bloodRequest->hospital }}</span><br>
    <span>Address: {{ $bloodRequest->hospital_address }}</span><br>
    <span>Date: {{ $bloodRequest->required_date }}</span><br>
    <span>Time: {{ $bloodRequest->required_time }}</span><br>
</p>
