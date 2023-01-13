import axios from 'axios';
import React, { Component } from 'react';
import Group from './Group';

class Add extends Component {
    state = { 
        years : [],
        group : '',
        group_av : '',
        studentCount: ''
     } 

     getDataYear = () => {
         axios.get("http://127.0.0.1:8000/api/group")
         .then((res)=>{
            this.setState({ 
                years:res.data 
             });
             console.log(res.data)
         }
         )};

         getData = (e) => {
             axios.get("http://127.0.0.1:8000/api/group/" + e.target.value)
             .then((res)=>{
                this.setState({ 
                    group: res.data.group,
                    group_av: res.data.group_av,
                    studentCount: res.data.studentCount
                 });
                // console.log(res.data)
             })
         };

         componentDidMount() {
            this.getDataYear()
         }



    render() { 
        return (
            <div>
                <h1>tableau de borde</h1>
                <div>
                    <select onChange={this.getData} name="" id="">
                        <option>Anne</option>
                        {this.state.years.map((year)=>(
                        <option  value={year.id}>{year.Annee_scolaire}</option>
                        ))}
                    </select>
                </div>
                <div>
                    <Group data={this.state.group_av} studentCount={this.state.studentCount} />
                </div>

            </div>
        );
    }
}
 
export default Add;
