@extends('layouts.master')

@section('main_content')
<div class="container">
    <h2>Create Subject</h2>
    <form action="{{ route('subject.store') }}" method="POST">
        @csrf

        <!-- Class Input -->
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="text" name="class" class="form-control" required>
        </div>

        <!-- Faculty Dropdown -->
        <div class="mb-3">
            <label for="faculty_id" class="form-label">Faculty</label>
            <select name="faculty_id" class="form-control" required>
                <option value="">Select Faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Batch Dropdown -->
        <div class="mb-3">
            <label for="batch_id" class="form-label">Batch</label>
            <select name="batch_id" class="form-control" required>
                <option value="">Select Batch</option>
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Semester Dropdown -->
        <div class="mb-3">
            <label for="semester_id" class="form-label">Semester</label>
            <select name="semester_id" id="semester_id" class="form-control" required>
                <option value="">Select Semester</option>
                @foreach($semesters as $semester)
                    <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Subject Name Dropdown (Dynamic based on semester) -->
        <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name</label>
           <input type="text" name="subject_name" id="subject_name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<script>
// Populate subjects based on semester selection
document.getElementById('semester_id').addEventListener('change', function() {
    const semesterId = this.value;
    const subjectSelect = document.getElementById('subject_name');
    
    // Clear existing options
    subjectSelect.innerHTML = '<option value="">Loading...</option>';
    
    if (semesterId) {
        // Define subjects by semester
        const subjectsBySemester = {
            '1': [
                'Mathematics I',
                'Physics I', 
                'Chemistry I',
                'English I',
                'Computer Fundamentals',
                'Digital Logic',
                'Programming Basics'
            ],
            '2': [
                'Mathematics II',
                'Physics II',
                'Chemistry II', 
                'English II',
                'Data Structures',
                'Object Oriented Programming',
                'Database Systems'
            ],
            '3': [
                'Mathematics III',
                'Software Engineering',
                'Computer Networks',
                'Web Development',
                'System Analysis',
                'Operating Systems'
            ],
            '4': [
                'Mathematics IV',
                'Mobile App Development',
                'Artificial Intelligence',
                'Machine Learning',
                'Project Management',
                'Cybersecurity'
            ],
            '5': [
                'Advanced Programming',
                'Cloud Computing',
                'Big Data Analytics',
                'Internet of Things',
                'Blockchain Technology'
            ],
            '6': [
                'Final Year Project',
                'Advanced Database',
                'Enterprise Applications',
                'Research Methodology',
                'Professional Ethics'
            ],
            '7': [
                'Internship',
                'Advanced AI',
                'Distributed Systems',
                'Advanced Networking'
            ],
            '8': [
                'Thesis',
                'Industry Project',
                'Seminar',
                'Capstone Project'
            ]
        };
        
        subjectSelect.innerHTML = '<option value="">Select Subject</option>';
        
        if (subjectsBySemester[semesterId]) {
            subjectsBySemester[semesterId].forEach(function(subject) {
                const option = document.createElement('option');
                option.value = subject;
                option.textContent = subject;
                subjectSelect.appendChild(option);
            });
        }
    } else {
        subjectSelect.innerHTML = '<option value="">Select Semester First</option>';
    }
});
</script>

@endsection
