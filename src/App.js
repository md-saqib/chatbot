import React, { Component } from 'react';
import PropTypes from 'prop-types';
import ChatBot, { Loading } from 'react-simple-chatbot';
import { ThemeProvider } from 'styled-components';
import BotAvt from './assets/vtulogo.png';

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

class DBPedia extends Component {
    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            result: '',
            trigger: false,
        };

        this.triggetNext = this.triggetNext.bind(this);
    }


    componentWillMount() {
        const self = this;
        const { steps } = this.props;
        const search = steps.search.value;
    //     const endpoint = encodeURI('https://dbpedia.org');
    //     const query = encodeURI(`
    //   select * where {
    //   ?x rdfs:label "${search}"@en .
    //   ?x rdfs:comment ?comment .
    //   FILTER (lang(?comment) = 'en')
    //   } LIMIT 100
    // `);

        const queryUrl = 'http://localhost/chatbot/services/searchcollege.php?college=${search}'

        const xhr = new XMLHttpRequest();

        xhr.addEventListener('readystatechange', readyStateChange);

        function readyStateChange() {
            if (this.readyState === 4) {
                const data = JSON.parse(this.responseText);
                const bindings = data.results.bindings;
                if (bindings && bindings.length > 0) {
                    self.setState({ loading: false, result: bindings[0].comment.value });
                } else {
                    self.setState({ loading: false, result: 'Not found.' });
                }
            }
        }

        xhr.open('GET', queryUrl);
        xhr.send();
    }

    triggetNext() {
        this.setState({ trigger: true }, () => {
            this.props.triggerNextStep();
        });
    }

    render() {
        const { trigger, loading, result } = this.state;

        return (
            <div className="dbpedia">
                { loading ? <Loading /> : result }
                {
                    !loading &&
                    <div
                        style={{
                            textAlign: 'center',
                            marginTop: 20,
                        }}
                    >
                        {
                            !trigger &&
                            <button
                                onClick={() => this.triggetNext()}
                            >
                                Search Again
                            </button>
                        }
                    </div>
                }
            </div>
        );
    }
}

DBPedia.propTypes = {
    steps: PropTypes.object,
    triggerNextStep: PropTypes.func,
};

DBPedia.defaultProps = {
    steps: undefined,
    triggerNextStep: undefined,
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
                component: <DBPedia />,
                waitAction: true,
                trigger: '1',
            },
        ]}
    />
    </ThemeProvider>
);


export default ExampleDBPedia;