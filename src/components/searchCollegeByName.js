import { useState, useEffect } from 'react';
import axios from 'axios';
import PropTypes from 'prop-types';
import ChatBot, { Loading } from 'react-simple-chatbot';

function SearchCollegeByName(props) {
    const [loading, setLoading] = useState(true);
    const [results, setResults] = useState({});
    const [trigger, setTrigger] = useState(false);
    const [collegeName, setCollegeName] = useState(props.steps.search.value);
    const getCollegeByNameUrl = 'http://localhost:8888/chatbot/services/searchcollege.php';

    useEffect(() => {
        axios
            .get(
                getCollegeByNameUrl + '?college=' + collegeName
            )
            .then(function (response) {
                if (response.status === 200) {
                    let collegeDetails = response.data.data;
                    if (collegeDetails) {
                        setResults(collegeDetails);
                        setLoading(false);
                    } else {
                        setResults('No data found');
                        setLoading(false);
                    }
                }
            })
            .catch(function () {
                setResults('Error, try again later!');
                setLoading(false);
            });
    }, [collegeName]);

    const triggetNext = () => {
        setTrigger(true);
        props.triggerNextStep();
    };

    return (
        <div className="dbpedia">
            { loading && <Loading /> }
            {results && results.length > 0 && results.map(
                (college, index) => {
                    return (
                        <div key={'college_' + index}>
                            <div>College Name: <a href={college.collegeWebsite} target="_blank">{college.collegeName}</a></div>
                            <div>Phone number: {college.collegePhone}</div>
                            <hr />
                            <br />
                        </div>
                    )
                }
            )}
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
                            onClick={() => triggetNext()}
                        >
                            Search Again
                        </button>
                    }
                </div>
            }
        </div>
    );
}

SearchCollegeByName.propTypes = {
    steps: PropTypes.object,
    triggerNextStep: PropTypes.func,
};

SearchCollegeByName.defaultProps = {
    steps: undefined,
    triggerNextStep: undefined,
};

export default SearchCollegeByName;
