const educationsArray=[
    {
        title: 'Secondary School Certificate',
        institute: 'Faridpur Zilla School',
        major: 'Science',
        gpa: '5.0/5.0'
    },
    {
        title: 'Higher Secondary School Certificate',
        institute: 'Govt. Rajendra College',
        major: 'Science',
        gpa: '5.0/5.0'
    },
    {
        title: 'Bachelor of Science',
        institute: 'Khulna University of Engineering & Technology',
        major: 'Computer Science and Engineering',
        gpa: '3.47/4.0'
    },
]


function appendEdu(edu) {
    const tempDiv = document.createElement('div');
    tempDiv.className='eduCard';
    tempDiv.innerHTML = `
    <div class="eduTitle"><img src='./assets/degree.png' class='eduIcons' /><div>${edu.title}</div></div>
    <div class="eduMajor"><img src='./assets/paper.png' class='eduIcons' /><div>${edu.major}</div></div>
    <div class="eduInstitute"><img src='./assets/college.png' class='eduIcons' /><div>${edu.institute}</div></div>
    <div class="eduGpa"><img src='./assets/result.png' class='eduIcons' />${edu.gpa}</div>
    `;
    // Use firstElementChild instead of firstChild to skip text nodes
    const educontainer=document.getElementById('education-container');
    educontainer.appendChild(tempDiv);
}


educationsArray.forEach(appendEdu);

function mainClick(){
    document.querySelectorAll('.container').forEach(el => {
        el.style.display = 'none';
      });      
    const mainDiv=document.getElementById('main-container');
    mainDiv.style.display='flex';
}

function contactClick(){
    document.querySelectorAll('.container').forEach(el => {
        el.style.display = 'none';
      });      
    const mainDiv=document.getElementById('contact-container');
    mainDiv.style.display='flex';
}


function skillClick(){
    document.querySelectorAll('.container').forEach(el => {
        el.style.display = 'none';
      });      
    const mainDiv=document.getElementById('skill-container');
    mainDiv.style.display='flex';
}

function eduClick(){
    document.querySelectorAll('.container').forEach(el => {
        el.style.display = 'none';
      });      
    const mainDiv=document.getElementById('education-container');
    mainDiv.style.display='flex';
}


function photoClick(){
    document.querySelectorAll('.container').forEach(el => {
        el.style.display = 'none';
      });      
    const mainDiv=document.getElementById('photography-container');
    mainDiv.style.display='block';
}

function projectClick(){
    document.querySelectorAll('.container').forEach(el => {
        el.style.display = 'none';
      });      
    const mainDiv=document.getElementById('project-container');
    mainDiv.style.display='flex';
}