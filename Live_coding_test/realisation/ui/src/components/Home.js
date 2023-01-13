import React, { Component } from "react";
import axios from "axios";
import { GroupAv } from './GroupAv';


export default class Home extends Component {
  constructor(props) {
        super(props);
        this.state = {
        years : [],
        group : '',
        valueSelect: '',
        group_av : ''
        };
      }
      getDatayears = () => {
        axios.get("http://localhost:8000/api/group").then((res) => {
          this.setState({
            years : res.data
          });
        });
      };
      
      componentDidMount() {
        this.getDatayears()
      }

   getData = (e) => {
    axios.get('http://localhost:8000/api/group/'+e.target.value).then((res) => {
      this.setState({
        group: res.data.group,
        group_av : res.data.group_av
      });
    });
  };


  render() {
    return (
      <div>
        <div className="row">
          <div className="col-md-8">
            <h1>tableau de borde d'état d'avancement</h1>
          </div>
          <div className="col-md-4 selectY">
            <select onChange={this.getData} placeholder="année" id="input">
              <option value={""}>Année</option>
              {this.state.years.map((item) => (
                <option value={item.id}>{item.Annee_scolaire}</option>
              ))}
            </select>
          </div>
        </div>

        <div className="row etatAv">
            <div className="col-md-6">
                <GroupAv data={this.state.group_av}/>
            </div>
        </div>
      </div>
    );
  }
}
