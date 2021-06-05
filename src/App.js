import ChatBot, { Loading } from 'react-simple-chatbot';
import { ThemeProvider } from 'styled-components';
import BotAvt from './assets/vtulogo.png';
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

function GoToPage(){
    window.location.href = 'http://www.google.com';
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
                trigger: 'indexMessage',
            },
            {
                id: 'indexMessage',
                message: 'Kindly choose from one of the following categories to get started.',
                trigger: 'indexOptions',
            },
            {
                id: 'indexOptions',
                options: [
                    { value: 1, label: 'About VTU', trigger: 'aboutVTU' },
                    { value: 2, label: 'Vision, Mission and Mandate', trigger: 'visionMissionMandate' },
                    { value: 3, label: 'Number 3', trigger: '3' },
                ],
            },
            {
                id: 'aboutVTU',
                message: 'Visvesvaraya Technological University is a collegiate public state university in Belagavi, ' +
                    'Karnataka established by the Government of Karnataka. Apart from a few notable exceptions, ' +
                    'VTU has authority over engineering education throughout the state of Karnataka.',
                trigger: 'aboutLoadMore',
            },
            {
                id: 'aboutLoadMore',
                component: <GoToPage />,
            },
            {
                id: 'visionMissionMandate',
                message: 'haha',
            },
            {
                id: '3',
                message: 'oops',
            },
        ]}
    />
    </ThemeProvider>
);


export default ExampleDBPedia;