import ChatBot, { Loading } from 'react-simple-chatbot';
import { ThemeProvider } from 'styled-components';
import BotAvt from './assets/vtulogo.png';
import vcImage from './assets/vcs-message3.jpg';
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

function research(){
    window.location.href = 'http://research.vtu.ac.in/';
}

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
                    // { value: 2, label: 'Vision, Mission and Mandate', trigger: 'visionMissionMandate' },
                    // { value: 3, label: 'Admission', trigger: 'admission' },
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
                    // { value: 4, label: 'Campuses', trigger: 'campuses' },
                    // { value: 5, label: 'Contact', trigger: 'contact' },
                    // { value: 6, label: 'Request a Call Back', trigger: 'callBack' },
                ],
            },
            {
                id: 'vcsMessage',
                component: (
                    <div>
                      <img class="vcImage" src={vcImage}></img>
                      <h4 class="vcTitle">Hon’ble Vice Chancellor <br></br><strong>Dr.Karisiddappa</strong></h4>
                      <p>Our hard-won reputation, as a Premier Technological University in the country, carries with it responsibility as well as opportunity. We must continue to encourage student-faculty interactions. We must also be responsible for our actions and behave accordingly, People look upto us to lead from the front and we must not disappoint them. We shall contribute to the society through the pursuit of education, learning, research and innovations at the highest levels of excellence.</p>
                      <div class="loadMoreButton"><a href="https://vtu.ac.in/en/vcs-message/">Read More</a></div>                      
                    </div>
                ),
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
              },
              {
                id: 'research',
                component: <research />,
              },
        ]}
    />
    </ThemeProvider>
);


export default ExampleDBPedia;