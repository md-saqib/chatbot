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
                id: '1',
                message: 'Type something to search on VTU',
                trigger: 'search',
            },
            {
                id: 'search',
                user: true,
                trigger: '3',
            },
            {
                id: '3',
                component: <SearchCollegeByName />,
                waitAction: true,
                trigger: '1',
            },
        ]}
    />
    </ThemeProvider>
);


export default ExampleDBPedia;