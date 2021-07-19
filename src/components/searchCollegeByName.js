import { useState, useEffect } from 'react';
import axios from 'axios';
import PropTypes from 'prop-types';
import ChatBot, { Loading } from 'react-simple-chatbot';

function SearchCollegeByName(props) {
    const [loading, setLoading] = useState(true);
    const [results, setResults] = useState({});
    const [trigger, setTrigger] = useState(false);
    console.log(props)
    const [collegeName, setCollegeName] = useState(props.steps.searchVTUColleges.value);
    const getCollegeByNameUrl = 'http://vtubot.tech/services/searchcollege.php';

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
                        setResults([]);
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
                            <div>College Name: {college.collegeName}</div>
                            <div>College Code: {college.collegeCode}</div>
                            <div>College Suburb: {college.collegeSuburb}</div>
                            <div>College Email: {college.collegeEmail}</div>
                            <div>College STD: {college.collegeSTD}</div>
                            <div>College Phone: {college.collegePhone}</div>
                            <div>College Website: {college.collegeWebsite}</div>
                            <div>College Address: {college.collegeAddress}</div>
                            <div>College City: {college.collegeCity}</div>
                            <div>College District: {college.collegeDistrict}</div>
                        </div>
                    )
                }
            )}
            {
                results.length === 0 && <div>College not found!</div>
            }
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