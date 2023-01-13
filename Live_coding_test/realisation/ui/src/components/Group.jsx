import React, { Component } from 'react';
import ProgressBar from 'react-bootstrap/ProgressBar';


class Group extends Component {
    constructor(props){
        super(props)
    }
    render() { 
        return (
            <div>
               <h5>Group avencement </h5>
               <p>Apprenant {this.props.studentCount} </p>
                <ProgressBar now={this.props.data} label={`${this.props.data}%`}/>

            </div>
        );
    }
}
 
export default Group;