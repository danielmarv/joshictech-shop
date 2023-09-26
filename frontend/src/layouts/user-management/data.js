import MDBox from "components/MDBox";
import MDTypography from "components/MDTypography";
import MDAvatar from "components/MDAvatar";
import MDBadge from "components/MDBadge";

// Images
import team2 from "assets/images/team-2.jpg";
import team3 from "assets/images/team-3.jpg";
import team4 from "assets/images/team-4.jpg";

export default function data() {
  const Author = ({ image, name, email }) => (
    <MDBox display="flex" alignItems="center" lineHeight={1}>
      <MDAvatar src={image} name={name} size="sm" />
      <MDBox ml={2} lineHeight={1}>
        <MDTypography display="block" variant="button" fontWeight="medium">
          {name}
        </MDTypography>
        <MDTypography variant="caption">{email}</MDTypography>
      </MDBox>
    </MDBox>
  );

  const Job = ({ title, description }) => (
    <MDBox lineHeight={1} textAlign="left">
      <MDTypography display="block" variant="caption" color="text" fontWeight="medium">
        {title}
      </MDTypography>
      <MDTypography variant="caption">{description}</MDTypography>
    </MDBox>
  );

  return {
    columns: [
      { Header: "user", accessor: "user", width: "45%", align: "left" },
      { Header: "email", accessor: "email", align: "left" },
      { Header: "role", accessor: "role", align: "left" },
      { Header: "creation date", accessor: "creationdate", align: "center" },
      { Header: "action", accessor: "action", align: "center" },
    ],

    rows: [
      {
        user: <Author image={team2} name="John Michael" email="" />,
        role: <Job title="Admin" description="" />,
        email: (
          <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
            admin@material.com
          </MDTypography>
        ),
        creationdate: (
          <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
            23/04/18
          </MDTypography>
        ),
        action: (
            <MDBox>
                <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium" mr={2}>
                Edit
                </MDTypography>
                <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
                Delete
                </MDTypography>
            </MDBox>
        ),
      },
      {
        user: <Author image={team3} name="Alexa Liras" email="" />,
        role: <Job title="Creator" description="" />,
        email: (
          <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
            creator@material.com
          </MDTypography>
        ),
        creationdate: (
          <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
            11/01/19
          </MDTypography>
        ),
        action: (
            <MDBox>
                <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium" mr={2}>
                Edit
                </MDTypography>
                <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
                Delete
                </MDTypography>
            </MDBox>
        ),
      },
      {
        user: <Author image={team4} name="Laurent Perrier" email="" />,
        role: <Job title="Member" description="" />,
        email: (
          <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
            member@material.com
          </MDTypography>
        ),
        creationdate: (
          <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
            19/09/17
          </MDTypography>
        ),
        action: (
          <MDBox>
            <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium" mr={2}>
              Edit
            </MDTypography>
            <MDTypography component="a" href="#" variant="caption" color="text" fontWeight="medium">
              Delete
            </MDTypography>
          </MDBox>
        ),
      },
    ],
  };
}
