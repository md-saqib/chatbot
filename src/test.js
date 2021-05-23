import ChatBot, { Loading } from 'react-simple-chatbot';
import { ThemeProvider } from 'styled-components';
import BotAvt from './assets/vtulogo.png';
import SearchCollegeByName from './components/searchCollegeByName';

// all available props
const theme = {
    background: '#f5f8fb',
    fontFamily: 'Helvetica Neue,Helvetica,Arial,sans-serif',
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
                    trigger: 'welcomeMessage',
                },
                {
                    id: 'welcomeMessage',
                    message: 'Kindly choose from one of the following categories to get started.',
                    trigger: 'indexOptions',
                },
                {
                    id: 'indexOptions',
                    options: [
                        { value: 1, label: 'About Visvesvaraya Technological University', trigger: 'aboutVTU' },
                        { value: 2, label: 'Vision, Mission and Mandate', trigger: 'visionMissionMandate' },
                        { value: 3, label: 'Number 3', trigger: '3' },
                    ],
                },
            ]}
        />
    </ThemeProvider>
);


export default ExampleDBPedia;