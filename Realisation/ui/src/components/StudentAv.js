import axios from 'axios'
import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class StudentAv extends Component {
    constructor(props){
        super(props)
        this.state = {
            valueSelect : '',
            studentAvs : [],
            students_av : [],
        }
    }
    onChange = (e)=>{
        let valueSelect = e.target.value
        let studentAvs = this.state.studentAvs
        let students_avs = []
        for(var i in studentAvs){
            let studentAv = studentAvs[i]
            if(studentAv.brief == valueSelect){
                studentAv = studentAvs[i]
                students_avs.push(studentAv)
            }
        }
        this.setState({
            students_av : students_avs
        })
    }
    getData = ()=>{
        axios.get('http://localhost:8000/api/studentAv')
        .then((res=>{
            this.setState({
                studentAvs : res.data.arr
            })
        }))
    }
    componentDidMount() {
        this.getData()
      }
  render() {
    return (
       <div className="row">
       <div className="col-md-12" style={{ marginLeft: 30, marginTop: 51}}>
        <div className="card">
        
          {/* /.card-header */}
          <div className="card-body">
            <div className="row">
              
              {/* /.col */}
              <div className="col-md-12">
                <p className="text-center">
                  <strong>Etat d'avancement des apprenants</strong>
                </p>
                <div className="progress-group">
                  <select onChange={this.onChange}  placeholder="Brief" id="input">
                     <option>Brief</option>
                       {this.props.data.map((item) => (
                     <option value={item?.id}>{item?.Nom_du_brief}</option>
                       ))}
                 </select>
                  <div className="progress progress-sm" id='progress'>
                 {this.state.students_av.map(item =>(
                     <div>
                        <p>{item.student_name}</p>
                    <div className="progress-bar bg-primary" style={{width:`${item.av}%`}}  label={`${item.av}%`}>{item.av}%</div>
                  </div>
                    ))}
                </div>  
              </div>
              
            </div>
           
          </div>
       
        </div>
    </div>
 
   </div>
   </div>
    )
  }
}

export default StudentAv