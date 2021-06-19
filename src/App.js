import ChatBot, { Loading } from 'react-simple-chatbot';
import { ThemeProvider } from 'styled-components';
import BotAvt from './assets/vtulogo.png';
import vcImage from './assets/vcs-message3.jpg';
import naac from './assets/naac-1-300x187.jpg';
import SearchCollegeByName from './components/searchCollegeByName';

// all available props
const theme = {
    background: '#f5f8fb',
    headerBgColor: '#202121',
    headerFontColor: '#fff',
    headerFontSize: '14px',
    botBubbleColor: '#202121',
    botFontColor: '#fff',
    userBubbleColor: '#fff',
    userFontColor: '#4a4a4a',
};



const ExampleDBPedia = () => (
    <ThemeProvider theme={theme}>
    <ChatBot
        headerTitle="Welcome To VTU ChatBot"
        botAvatar= {BotAvt}
        recognitionEnable={true}
        steps={[
            {
                id: 'welcomeMessage',
                message: 'Hello! Welcome to Visvesvaraya Technological University. How may I help you?',
                trigger: 'getStarted',
            },
            {
                id: 'getStarted',
                message: 'Kindly choose from one of the following categories to get started.',
                trigger: 'mainMenu',
            },
            {
                id: 'mainMenu',
                options: [
                    { value: 1, label: 'About VTU', trigger: 'aboutVTU' },
                    { value: 2, label: 'Academic', trigger: 'academic' },
                    { value: 3, label: 'Examination', trigger: 'examination' },
                    // { value: 4, label: 'Campuses', trigger: 'campuses' },
                    // { value: 5, label: 'Contact', trigger: 'contact' },
                    // { value: 6, label: 'Request a Call Back', trigger: 'callBack' },
                ],
            },
            {
                id: 'aboutVTU',
                message: 'Visvesvaraya Technological University is a collegiate public state university in Belagavi, ' +
                    'Karnataka established by the Government of Karnataka. Apart from a few notable exceptions, ' +
                    'VTU has authority over engineering education throughout the state of Karnataka.',
                trigger: 'aboutMenu',
            },
            {
                id: 'aboutMenu',
                options: [
                    { value: 1, label: 'VC\'s Message', trigger: 'vcsMessage' },
                    { value: 2, label: 'Research', trigger: 'research' },
                    { value: 3, label: 'Vision, Mission and Mandate', trigger: 'vision' },
                    { value: 4, label: 'NAAC', trigger: 'naac' },
                    { value: 5, label: 'Administration', trigger: 'administration' },
                ],
            },
            {
                id: 'vcsMessage',
                component: (
                    <div>
                      <img class="componentImage" src={vcImage} alt=""></img>
                      <h4 class="componentTitle">Hon’ble Vice Chancellor <br></br><strong>Dr.Karisiddappa</strong></h4>
                      <p>Our hard-won reputation, as a Premier Technological University in the country, carries with it responsibility as well as opportunity. We must continue to encourage student-faculty interactions. We must also be responsible for our actions and behave accordingly, People look upto us to lead from the front and we must not disappoint them. We shall contribute to the society through the pursuit of education, learning, research and innovations at the highest levels of excellence.</p>
                      <div class="loadMoreButton"><a href="https://vtu.ac.in/en/vcs-message/" rel="noreferrer" target="_blank">Read More</a></div>                      
                    </div>
                ),
                trigger: 'finish-question',
              },
              {
                id: 'vision',
                component: (
                    <div>
                      <h4>Vision</h4>
                      <p>To become an outstanding Technological University at the cutting edge of Science and Technology that produces world class Knowledge-delivery, Research, Extension and Leadership in Technology innovation for Industry and Society.</p>                   
                    </div>
                ),
                trigger: 'mission',
              },
              {
                id: 'mission',
                component: (
                    <div>
                      <h4>Mission</h4>
                      <p>To plan the development of technical education, to establish value-based and need-based education and training in engineering and technology, with a view to generate qualified and competent manpower, responsive to technological and societal needs.</p>                   
                    </div>
                ),
                trigger: 'mandate',
              },
              {
                id: 'mandate',
                component: (
                    <div>
                      <h4>Mission</h4>
                      <p>The Visvesvaraya Technological University has been established by the Government of the Karnataka in order to Promote planned and sustainable development of technical education consistent with state and national policies.</p>                   
                    </div>
                ),
                trigger: 'finish-question',
              },
              {
                id: 'research',
                component: (<p>redirect to research page</p>),
                trigger: 'finish-question',
              },
              {
                id: 'naac',
                component: (
                    <div>
                      <img class="componentImage" src={naac} alt=""></img>
                      <h4 class="componentTitle"><strong>NAAC </strong></h4>
                      <p>The VTU is launching the NAAC activities after appointing the full-time faculty in 2014. It is submitted to Planning the SSR (Self Study Report) by the end of the year 2019.It has already been initiated by the NAAC process of establishing IQAC in the year 2017. It is also the report on data collection and preparation of the criteria. NAAC Awareness Two workshops were organized on 16th March 2018 & 17th March 2018. On 16th March 2018 Dr.NCShivaprakash professor IISC Bangaluru was a technical person for the resource person. The resource person was Dr. Ganesh Hegade Advisor NAAC Bangaluru.</p>
                      <div class="loadMoreButton"><a href="https://vtu.ac.in/en/naac/" rel="noreferrer" target="_blank">Read More</a></div>                      
                    </div>
                ),
                trigger: 'finish-question',
              },
              {
                id: 'administration',
                component: (<p>redirect to administration page</p>),
                trigger: 'finish-question',
              },

              {
                id: 'academic',
                options: [
                    { value: 1, label: 'Circulars and Notifications', trigger: 'circAndNotif' },
                    { value: 2, label: 'Fee Structure', trigger: 'feeStructure' },
                    { value: 3, label: 'Academic Calendar', trigger: 'academicCalendar' },
                ],
              },
              {
                id: 'circAndNotif',
                component: (<p>redirect to Circulars and Notifications page</p>),
                trigger: 'finish-question',
              },

              {
                id: 'feeStructure',
                options: [
                    { value: 1, label: 'UG Registration & Other Fee', trigger: 'ugFee' },
                    { value: 2, label: 'PG Registration & Other Fee', trigger: 'pgFee' },
                ],
              },
              {
                id: 'ugFee',
                component: (<p>redirect to ugFee page</p>),
                trigger: 'finish-question',
              },
              {
                id: 'pgFee',
                component: (<p>redirect to pgFee page</p>),
                trigger: 'finish-question',
              },
              {
                id: 'academicCalendar',
                component: (<p>redirect to Academic Calendar page</p>),
                trigger: 'finish-question',
              },

              {
                id: 'examination',
                options: [
                    { value: 1, label: 'Examination Guidlines', trigger: 'examinationGuidelines' },
                    { value: 2, label: 'Exam Application', trigger: 'examApplication' },
                    { value: 3, label: 'Exam Circulars & Notifications', trigger: 'examCircNotif' },
                    { value: 4, label: 'Result', trigger: 'result' },
                    { value: 5, label: 'Time Table', trigger: 'timeTable' },
                ],
              },
              {
                id: 'examinationGuidelines',
                component: (<p>redirect to Examination Guidlines page</p>),
                trigger: 'finish-question',
              },
              {
                id: 'examApplication',
                component: (<p>redirect to Exam Application page</p>),
                trigger: 'finish-question',
              },
              {
                id: 'result',
                component: (<p>redirect to Result page</p>),
                trigger: 'finish-question',
              },
              {
                id: 'timeTable',
                component: (<p>redirect to Time Table page</p>),
                trigger: 'finish-question',
              },
              


                {
                  id: 'finish-question',
                  message: 'Do you like to see another screen?',
                  trigger: 'question-result',
                },
                {
                  id: 'question-result',
                  options: [
                    { value: 'yes', label: 'Yes', trigger: 'getStarted' },
                    { value: 'no', label: 'No, thanks', trigger: 'finish' },
                  ],
                },
                {
                  id: 'finish',
                  message: 'Please Star the project if you like it! Thanks! :)',
                  end: true,
                },
              
        ]}
    />
    </ThemeProvider>
);


export default ExampleDBPedia;